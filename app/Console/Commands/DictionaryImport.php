<?php

namespace App\Console\Commands;

use App\Models\Term;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\PHP;

class DictionaryImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:dictionary {--file=} {--dir=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import date from text files.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filesToProcess = [];
        $errors = [];

        // get the specified file
        if ($file = $this->option('file')) {
            if (!file_exists($file)) {
                $errors[] = "File {$file} not found.";
            }
            $filesToProcess[] = $file;
        }

        // get specified directory
        if ($directory = $this->option('dir')) {
            $directory = rtrim($directory, '/');
            if (!file_exists($directory) || !is_dir($directory)) {
                $errors[] = "Directory {$directory} not found.";
            }
            $filesToProcess = array_merge(
                $filesToProcess,
                array_map(
                    function($filename) use ($directory):string  {
                        return $directory . DIRECTORY_SEPARATOR . $filename;
                    },
                    array_filter(
                        scandir($directory),
                        function ($filename):bool {
                            return (!in_array($filename, ['.', '..']));
                        }
                    )
                )
            );
        }

        if (empty($filesToProcess)) {
            echo PHP_EOL . 'You must specify at least a file or a directory to process.';
            $this->displayHelp();
            return 0;
        }

        if (!empty($errors)) {
            echo PHP_EOL;
            echo implode(PHP_EOL, $errors);
            echo PHP_EOL . PHP_EOL;
            return 0;
        }

        $termModel = new \App\Models\Term();

        // get Parts of Speech, Languages and Collins Tags
        $partsOfSpeech = \App\Models\Pos::selectOptions();
        $langs = \App\Models\Lang::selectOptions('abbrev');
        $langsByAbbrev = \App\Models\Lang::selectOptionsByAbbrev('full');
        $grades = \App\Models\Grade::selectOptions();
        $collinsTags = \App\Models\CollinsTag::selectOptions();

        // create data array to hold the data for each term to be inserted
        $fields = $termModel->getFillableFields();
        $data = $this->initializeDataArray($fields);

        // process the files
        foreach ($filesToProcess as $file) {
            echo "Processing {$file} ..." . PHP_EOL;
            $fh = fopen($file, 'r');
            if ($fh) {
                $ctr = 1;
                while (!feof($fh)) {
                    $line = trim(fgets($fh));

                    if (strlen($line) > 0) {

                        $langFound = false;
                        foreach ($langsByAbbrev as $abbrev => $full) {

                            if (0 === strpos($line, "{$full}:")) {

                                $langFound = true;

                                $line = trim(substr($line, strlen("{$full}:")));

                                if ($abbrev === 'en-us') {
                                    $enUsParts = explode('/', $line);
                                    $line = trim($enUsParts[0]);
                                    $data['term'] = $line;
                                    if (array_key_exists(1, $enUsParts)) {
                                        $data['pron_en_us'] = '/' . $enUsParts[1] . '/';
                                    }

                                } elseif ($abbrev === 'en-uk') {
                                    $enUkParts = explode('/', $line);
                                    $line = trim($enUkParts[0]);
                                    foreach ($partsOfSpeech as $id=>$pos) {
                                        // sometimes the part of speech comes before the pronunciation
                                        $expectedN = strlen($line) - strlen($pos) - 1;
                                        if ($expectedN === $n = strpos($line, " {$pos}")) {
                                            $data['pos_text'] = $pos;
                                            $data['pos_id'] = $id;
                                            $line = trim(substr($line, 0, $expectedN));
                                            break;
                                        }
                                    }
                                    if (array_key_exists(1, $enUkParts)) {
                                        $data['pron_en_uk'] = '/' . $enUkParts[1] . '/';
                                    }
                                    if (array_key_exists(2, $enUkParts)) {
                                        $enUkParts[2] = trim($enUkParts[2]);
                                        if (!empty($enUkParts[2])) {
                                            $data['pos_text'] = $enUkParts[2];
                                            if ($key = array_search($data['pos_text'], $partsOfSpeech)) {
                                                $data['pos_id'] = $key;
                                            }
                                        }
                                    }
                                }
                                $data[str_replace('-', '_', $abbrev)] = $line;

                                break;
                            }
                        }
                        if (!$langFound) {
                            if ($ctr === 1) {
                                for ($i=1; $i<=count($collinsTags); $i++) {
                                    if (strpos($line, $collinsTags[$i]) === 0) {
                                        $data['collins_tag'] = substr($line, 0, strlen($collinsTags[$i]) + 1);
                                        $line = trim(substr($line, strlen($collinsTags[$i]) + 1));
                                        break;
                                    }
                                }
                                $data['definition'] = $line;
                                $data['collins_def'] = $line;
                                $ctr++;
                            } elseif ($ctr === 2) {
                                $data['sentence'] = $line;
                                $ctr++;
                            } else {
                                echo PHP_EOL . "Unrecognized line =>{$line}<==";
                            }
                        }
                    }
                }
                fclose($fh);

                //@TODO add a check for duplicates before we insert
                try {
                    DB::table('terms')->insert($data);
                    echo '...Term inserted successfully.' . PHP_EOL;
                } catch (\Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }

            } else {
                echo "File {$file} could not be processed." . PHP_EOL;
            }

            // reset the data array
            $data = $this->initializeDataArray($fields);
        }

        return 1;
    }

    public function initializeDataArray($fields) {
        $data = [];
        foreach ($fields as $field) {
            if ($field === 'enabled') {
                $data[$field] = 1;
            } elseif (in_array($field, ['pos_id', 'category_id', 'grade_id'])) {
                $data[$field] = 1;
            } else {
                $data[$field] = '';
            }
        }
        return $data;
    }

    public function displayHelp()
    {
        echo PHP_EOL . PHP_EOL . 'php artisan import:dictionary {--file=} {--dir=}';
        return;
    }
}

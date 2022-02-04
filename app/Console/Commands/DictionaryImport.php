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

        // get categories
        $categories = array_map(
            function($value): string { return $value->name; },
            DB::table('categories')->select(['name'])->get()->toArray()
        );

        // get languages
        $langs = [];
        foreach (DB::table('langs')->select(['abbrev', 'full'])->get() as $row) {
            $langs[str_replace('-', '_', $row->abbrev)] = $row->full;
        }

        // create array to hold the data for each term to be inserted
        $data = [];
        foreach ($termModel->getFillableFields() as $field) {
            $data[$field] = '';
        }

        // process the files
        foreach ($filesToProcess as $file) {
            echo "Processing {$file} ..." . PHP_EOL;
            $fh = fopen($file, 'r');
            if ($fh) {
                while (!feof($fh)) {
                    $line = trim(fgets($fh));

                    if (strlen($line) > 0) {
                        $ctr = 1;
                        $langFound = false;
                        foreach ($langs as $abbrev => $full) {
                            if (0 === strpos($line, "{$full}:")) {
                                $langFound = true;
                                $line = trim(substr($line, strlen("{$full}:")));
                                if ($abbrev === 'en_us') {
                                    $enUsParts = explode('/', $line);
                                    $line = trim($enUsParts[0]);
                                    $data['term'] = $line;
                                    if (array_key_exists(1, $enUsParts)) {
                                        $data['pron_en_us'] = $enUsParts[1];
                                    }
                                } elseif ($abbrev === 'en_uk') {
                                    $enUkParts = explode('/', $line);
                                    $line = trim($enUkParts[0]);
                                    if (array_key_exists(1, $enUkParts)) {
                                        $data['pron_en_uk'] = $enUkParts[1];
                                    }
                                    if (array_key_exists(2, $enUkParts)) {
                                        $data['pos_text'] = trim($enUkParts[2]);
                                    }
                                }
                                $data[$abbrev] = $line;

                                break;
                            }
                        }

                        if (!$langFound) {
                            if ($ctr === 1) {
                                for ($i=0; $i<count($categories); $i++) {
                                    if (strpos($line, $categories[$i]) === 0) {
                                        $data['category_text'] = substr($line, 0, strlen($categories[$i]) + 1);
                                        $line = trim(substr($line, strlen($categories[$i]) + 1));
                                        break;
                                    }
                                }
                                $data['definition'] = $line;
                            } elseif ($ctr === 2) {
                                $data['sentence'] = $line;
                            } else {
                                echo PHP_EOL . "Unrecognized line =>{$line}<==";
                            }
                            $ctr++;
                        }
                    }
                }
                fclose($fh);

                //@TODO add a check for duplicates before we insert
                //var_dump($data);
                try {
                    DB::table('terms')->insert($data);
                    echo '...Term inserted successfully.' . PHP_EOL;
                } catch (\Exception $e) {
                    echo $e->getMessage() . PHP_EOL;
                }

            } else {
                echo "File {$file} could not be processed." . PHP_EOL;
            }

            // reset the values array
            foreach ($data as $key=>$val) {
                $data[$key] = '';
            }
        }

        return 1;
    }

    public function displayHelp()
    {
        echo PHP_EOL . PHP_EOL . 'php artisan import:dictionary {--file=} {--dir=}';
        return;
    }
}

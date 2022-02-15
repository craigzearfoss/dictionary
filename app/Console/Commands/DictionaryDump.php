<?php

namespace App\Console\Commands;

use App\Models\Term;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\CodeCoverage\Report\PHP;

class DictionaryDump extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:dictionary {--dir=} {--file=}';

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
        $ds = DIRECTORY_SEPARATOR;

        $directory = $this->option('dir');
        $directory = rtrim($directory, $ds);
        if (!file_exists($directory) || !is_dir($directory)) {
            $errors[] = "Directory {$directory} not found.";
        }

        $file = $this->option('file');
        if (empty($file)) {
            $file = 'dictionary_' . date("Ymd-His") . '.sql';
        }

        $command = 'mysqldump -u ' . env('DB_USERNAME') . ' -p' . env('DB_PASSWORD') . " -databases dictionary > {$directory}/{$file}";

        try {
            exec($command);
        } catch (\Exception $e) {
            echo $e->getMessage() . PHP_EOL;
            return 0;
            die;
        }

        echo 'Complete' . PHP_EOL;
        return 1;
    }

    public function displayHelp()
    {
        echo PHP_EOL . PHP_EOL . 'php artisan import:dictionary {--file=} {--dir=}';
        return;
    }
}

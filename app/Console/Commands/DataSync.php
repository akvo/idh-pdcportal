<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\SeedController;

class DataSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:sync
                            {form_id? : sync data by given form id ?}
                            {--all : sync all data by data config}
                            {--forms : sync only forms table by data config}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync database with new dataset';

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
    public function handle(SeedController $seeder)
    {
        $startSeed = microtime(true);
        $fid = $this->argument('form_id');
        $all = $this->option('all');
        $forms = $this->option('forms');
        $sources = config('data.sources');
        if ($all) {
            echo("Total data to seed: ".count($sources).PHP_EOL);
        }
        if ($fid) {
            $sources = collect($sources)->where('fid', $fid)->values();
        }

        if ($all || $fid) {
            foreach ($sources as $key => $data) {
                $start = microtime(true);

                echo(PHP_EOL."Iteration: ".$key.PHP_EOL);
                echo("Seeding Form fid: ".$data['fid'].PHP_EOL);
                $seeder->createForm($data);
                echo("Done: ".$data['fid'].PHP_EOL);

                $time_elapsed_secs = microtime(true) - $start;
                $this->info("Time : ".date("H:i:s", $time_elapsed_secs));
            }
        }

        if ($forms) {
            echo("Sync Form Table".PHP_EOL);
            foreach ($sources as $key => $data) {
                echo("Form id: ".$data['fid'].PHP_EOL);
                $seeder->syncFormTable($data);
            }
        }

        $time_elapsed_secs_seed = microtime(true) - $startSeed;
        $this->info("Total time : ".date("H:i:s", $time_elapsed_secs_seed));
        return "finish";
    }
}

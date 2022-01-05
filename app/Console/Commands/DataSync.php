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
    protected $signature = 'data:sync {form_id?} {--all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $fid = $this->argument('form_id');
        $all = $this->option('all');
        if ($all) {
            $fid = 'all';
        }
        $sources = config('data.sources');
        if ($fid !== 'all') {
            echo("Seeding Forms fid: ".$fid.PHP_EOL);
            $sources = collect($sources)->where('fid', $fid)->values();
        }
        foreach ($sources as $data) {
            echo("Seeding Forms fid: ".$data['fid'].PHP_EOL);
            $seeder->createForm($data);
        }
        return "finish";
    }
}

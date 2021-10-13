<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LinkConfigCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'config:link';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create soft link for site specific config files';

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
     * @return mixed
     */
    public function handle()
    {
        $site = config('common.site');
        exec("cd config; ln -s -f ../sites/$site/* ./") ;
    }




}

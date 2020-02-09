<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class SecretCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'SecretCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SecretCommand';

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
        $users = 10;

        $bar = $this->output->createProgressBar($users);

        for($i = 1; $i<=$users;$i++){
            sleep(1);
            $bar->advance();
        }
        $bar->finish();

    }
}

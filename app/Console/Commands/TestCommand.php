<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'TestCommand {param1} {--param2=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'TestCommand';

    public $actionArr = [
        0=>'initIssue',
        1=>'getArticleCount',
        2=>'initArticleTitle',
        3=>'randomArticle',
    ];

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
        $param1 = $this->argument('param1');
        $param2 = $this->option('param2');
        $this->line($param1);
        $this->info($param2);
        $this->comment($param2);

        $this->initConsole();

        return true;
    }

    public function initConsole(){
        $answer = $this->choice('请选择要操作的数字', $this->actionArr);
        if(array_key_exists(intval($answer), $this->actionArr) || in_array($answer, $this->actionArr)){
            $this->info('正在执行：' . $answer . PHP_EOL);

            $this->$answer();
        }

        // 持续交互
        $this->initConsole();
    }

    public function getArticleCount(){

    }
}

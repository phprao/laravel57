<?php

namespace App\Console\Commands;

use App\Jobs\TestJob;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class DispatchCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DispatchCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DispatchCommand';

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
        $this->test1();
//        $this->test2();
    }

    // 延迟执行
    public function test2()
    {
        $data = ['data' => Str::random(10), 'time' => date('Y-m-d H:i:s')];
        dispatch(new TestJob($data))->delay(now()->addMinute(20))->onConnection('redis')->onQueue('testqueue');
    }

    public function test1()
    {
        $data = ['data' => Str::random(10), 'time' => date('Y-m-d H:i:s')];
        dispatch(new TestJob($data))->onConnection('redis')->onQueue('testqueue');
    }
}

<?php

namespace App\Console\Commands;

use App\Exports\CollectionExport;
use App\Exports\UsersExport;
use App\Model\CzMagazineTitle;
use App\Model\MapCity;
use App\Services\DataProcessor\AddEndSignature;
use App\Services\DataProcessor\AddPreTime;
use App\Services\DataProcessor\DataTransfer;
use Illuminate\Console\Command;
use Illuminate\Container\Container;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;

class DemoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DemoCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'DemoCommand';

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
        $this->test7();
    }

    function test8(){
        $pinyin = app('pinyin');
        $this->info($pinyin->sentence('带着希望去旅行，比到达终点更美好'));
    }

    function test7(){
        $cellData = [
            ['学号', '姓名', '成绩'],
            ['10001', 'AAAAA', '99'],
            ['10002', 'BBBBB', '92'],
            ['10003', 'CCCCC', '95'],
            ['10004', 'DDDDD', '89'],
            ['10005', 'EEEEE', '96'],
        ];
        $export = new UsersExport($cellData);
        $contents = Excel::raw($export, \Maatwebsite\Excel\Excel::XLSX);// Excel::XLSX 提示未定义，应使用
        file_put_contents('aa2.xlsx', $contents, FILE_APPEND);

        // $coll = MapCity::take(10)->get();
        // $coll->storeExcel('map/collection2.xlsx');
        //
        // (new Collection($cellData))->storeExcel('map/array2.xlsx');
    }

    function test6()
    {
        $cellData = [
            ['学号', '姓名', '成绩'],
            ['10001', 'AAAAA', '99'],
            ['10002', 'BBBBB', '92'],
            ['10003', 'CCCCC', '95'],
            ['10004', 'DDDDD', '89'],
            ['10005', 'EEEEE', '96'],
        ];

        $export = new UsersExport($cellData);
        Excel::store($export, 'invoices.xlsx');
    }

    function test4()
    {
        $start = microtime(true);
        $num = 0;
        MapCity::chunk(10, function () use (&$num) {
            $num += 10;
        });

        $end = microtime(true);

        $this->info($num);
        $this->info($end-$start);
    }

    function test5()
    {
        $start = microtime(true);
        $num = 0;
        foreach (MapCity::cursor() as $v) {
            $num++;
        }

        $end = microtime(true);

        $this->info($num);
        $this->info($end-$start);
    }

    function test3()
    {
        $fun1 = function () {
            return true;
        };

        var_dump($fun1);
    }

    function test2()
    {
        $service = AddEndSignature::class;
        //通过Container
        $container = Container::getInstance();
        $container->make($service);
        //
        app($service);

        app()->make($service);

        resolve($service);
    }

    function test1()
    {
        $pipes = [
            AddPreTime::class,
            DataTransfer::class,
            AddEndSignature::class,
        ];

        $data = ['contents' => 'asdhbybopwertyuip'];

        $result = app(Pipeline::class)
            ->send($data)
            ->through($pipes)
            ->via('handle')
            ->then(function ($datas) {
                return $datas;
            });

        $this->info(print_r($result, true));
    }
}

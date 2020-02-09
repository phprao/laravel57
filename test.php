<?php
/**
 * ----------------------------------------------------------
 * date: 2020/1/3 14:47
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

// $clo = function ($name) {
//     echo $name;
// };
//
// var_dump($clo);

// $obj = new Closure()

// class Test {
//     public static $name = "rao";
//     protected static $color = "red";
//     private static $height = "188";
//
//     public $age = 12;
//     protected $sex = 1;
//     private $weight = 100;
//
//     function a(){
//         $fun = static function (){
//             var_dump(Test::$name);
//             var_dump(Test::$color);
//             var_dump(Test::$height);
//             // var_dump($this->age);
//             // var_dump($this->sex);
//             // var_dump($this->weight);
//         };
//
//         var_dump($fun);
//         $fun();
//     }
// }

// (new Test())->a();
//
// echo '----------------------------'.PHP_EOL;

// $fun2 = function (){
//     var_dump(Test::$name); // yes
//     var_dump(Test::$color); // no
//     var_dump(Test::$height); // no
//     var_dump($this->age); // no
//     var_dump($this->sex); // no
//     var_dump($this->weight); // no
// };

// $fun22 = Closure::bind($fun2, new Test(), Test::class);
// $fun22 = $fun2->bindTo(new Test(), Test::class);

// var_dump($fun22);
// $fun22();

// 一次性的，绑定$this，并可以传入参数，直接发起调用
// $fun2->call(new Test());

//
// $file="C:\Users\Administrator.DESKTOP-TPJL4TC\Desktop\机器人\嘉祥馆藏\图书借阅排行.csv";
//
// $arr = array_filter(explode(PHP_EOL, file_get_contents($file)));
//
// $ret = array_reduce($arr, function($carry, $item){
//     $temp = explode(',', $item);
//     $carry .= $temp[1] . ',';
//     return $carry;
// });
//
// echo $ret;

// $reflector = new ReflectionClass(Test::class);
// echo $reflector->name;


/**
 * 查看文件大小：ll -lh apache-jmeter-4.0.zip
 * 50M
 */

$file = 'apache-jmeter-4.0.zip';

read1($file);
echo "------------------------------------".PHP_EOL;
read2($file);
echo "------------------------------------".PHP_EOL;
read3($file);

function read1($file){
    $mem_start = memory_get_usage();
    $time_start = microtime(true);

    $cont = file_get_contents($file);
    $arr = explode(PHP_EOL, $cont);
    $n = 0;
    foreach($arr as $k => $v){
        $n++;
    }
    var_dump($n);

    $time_end = microtime(true);
    $mem_end = memory_get_usage();
    echo '1-使用内存：'.round(($mem_end - $mem_start)/1024/1024, 2).'MB'.PHP_EOL;
    echo '1-使用时间：'.round($time_end - $time_start, 2).PHP_EOL;
}

function read2($file){
    $mem_start = memory_get_usage();
    $time_start = microtime(true);

    $n = 0;
    $generator = readTxt($file);
    foreach($generator as $k => $v){
        $n++;
    }
    var_dump($n);

    $time_end = microtime(true);
    $mem_end = memory_get_usage();
    echo '2-使用内存：'.round(($mem_end - $mem_start)/1024/1024, 2).'MB'.PHP_EOL;
    echo '2-使用时间：'.round($time_end - $time_start, 2).PHP_EOL;
}

function readTxt($file){
    $hand = fopen($file, 'r');
    var_dump($hand);
    while(!feof($hand)){
        yield fgets($hand);
    }
    fclose($hand);
}

function read3($file){
    $mem_start = memory_get_usage();
    $time_start = microtime(true);

    $hand = fopen($file, 'r');
    $n = 0;
    while(!feof($hand)){
        fgets($hand);
        $n++;
    }
    var_dump($n);

    $time_end = microtime(true);
    $mem_end = memory_get_usage();
    echo '3-使用内存：'.round(($mem_end - $mem_start)/1024/1024, 2).'MB'.PHP_EOL;
    echo '3-使用时间：'.round($time_end - $time_start, 2).PHP_EOL;
}



function input($file){
    for($i=1;$i<=100000;$i++){
        file_put_contents($file, 'ddb637y3468666zz9567	1000785097	2019-12-30	2022-12-30	100.00	否	图书卡	qbgjhuwd'.PHP_EOL, FILE_APPEND);
    }
}


<?php
/**
 * ----------------------------------------------------------
 * date: 2020/1/3 9:01
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Http\Controllers\Main;


use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function info(){
        dump($_SERVER);
        dump($_ENV);
        // var_dump(getenv("APP_ENV"));
        // var_dump(getenv("REMOTE_ADDR"));

        // phpinfo();
    }
}
<?php
/**
 * ----------------------------------------------------------
 * date: 2020/1/7 15:34
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Services\DataProcessor;


use Closure;
use Illuminate\Support\Str;

class DataTransfer implements DataProcessorInterface
{
    public function handle($data, Closure $next)
    {
        $data['contents'] = Str::upper($data['contents']);

        return $next($data);
    }

}
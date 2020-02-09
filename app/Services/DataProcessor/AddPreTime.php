<?php
/**
 * ----------------------------------------------------------
 * date: 2020/1/7 15:33
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Services\DataProcessor;


use Closure;

class AddPreTime implements DataProcessorInterface
{
    public function handle($data, Closure $next)
    {
        $data['preTime'] = date('Y-m-d H:i:s');

        return $next($data);
    }

}
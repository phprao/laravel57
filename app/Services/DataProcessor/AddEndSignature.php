<?php
/**
 * ----------------------------------------------------------
 * date: 2020/1/7 15:35
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Services\DataProcessor;


use Closure;
use Illuminate\Support\Str;

class AddEndSignature implements DataProcessorInterface
{
    public function handle($data, Closure $next)
    {
        $data['signature'] = Str::random(10);

        return $next($data);
    }

}
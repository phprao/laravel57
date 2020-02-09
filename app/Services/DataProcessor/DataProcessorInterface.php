<?php
/**
 * ----------------------------------------------------------
 * date: 2020/1/7 15:29
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe:
 * ----------------------------------------------------------
 */

namespace App\Services\DataProcessor;


use Closure;

interface DataProcessorInterface
{
    /**
     * @param $data
     * @param Closure $next
     * @return mixed
     */
    public function handle($data, Closure $next);
}
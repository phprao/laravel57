<?php
/**
 * ----------------------------------------------------------
 * date: 2019/6/10 8:42
 * ----------------------------------------------------------
 * author: Raoxiaoya
 * ----------------------------------------------------------
 * describe: 记录请求日志
 * ----------------------------------------------------------
 */

namespace App\Http\Middleware;

use App\Traits\Controller\AjaxTraits;
use Closure;
use Illuminate\Support\Facades\Log;

class RequestLog
{
    use  AjaxTraits;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            Log::debug('Request | '.$request->getPathInfo().' |', $request->input());
            $response = $next($request);
            return $response;
        } catch (HttpException $e) {
            return $this->ajaxResponse($e->getStatusCode(), $e->getMessage(), (object)[]);
        } catch (\Exception $e) {
            return $this->apiSysErrorResponse($e->getMessage(), (object)[]);
        }

    }
}
<?php

namespace App\Http\Middleware;

use Closure;

class src
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* $url=$_SERVER['HTTP_REFERER'];
        session(['url'=>$url]); 
        return $next($request); */
        $response = $next($request);
        
        $url=$_SERVER['HTTP_REFERER'];
        session(['url'=>$url]); 
        
        return $response;  //后置中间件  在应用程序处理请求 后 运行它的任务
    }
}

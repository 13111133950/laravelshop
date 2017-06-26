<?php

namespace App\Http\Middleware;

use Closure;

class logincheck
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
        if(!session('user')){
            $url=$_SERVER['HTTP_REFERER'];
            session(['url'=>$url]);
            return redirect('log')->withErrors('您还未登陆，请先登陆');
        }
    }
}

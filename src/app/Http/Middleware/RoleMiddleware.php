<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
//Kernelクラスにregisterしてrouteで使用する
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role) //引数に$roleを追加
    {
        if (!$request->user()->userHasRole($role)) {
            abort(403, 'You are not authorized'); //エラーコードとメッセージをセット
        }
        return $next($request);
    }
}

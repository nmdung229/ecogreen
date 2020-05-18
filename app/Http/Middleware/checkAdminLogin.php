<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdminLogin
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
        if(Auth::check()) {
            $user = Auth::user();
            if($user->role_id == 1 && $user->is_active == 1) {
                return $next($request);
            }
            else if($user->role_id == 2 && $user->is_active == 1){
                return redirect()->route('shop.home');
            }
            else {
                Auth::logout();
                return redirect()->route('getLogin')->with('status', 'Bạn không có quyền truy cập!');
            }
        }
        else {
//            die("1234");
            return redirect('admin/login');
        }

    }
}

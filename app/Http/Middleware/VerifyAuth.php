<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class VerifyAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->session()->has('admin')) {
            
            return redirect('/manage/login');
        }

        $adminSession = $request->session()->get('admin');

        $adminData = Admin::find($adminSession['id']);

        if (empty($adminData) || $adminData->status == 0) {
            
            return redirect('/admin/login');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        $user = \App\User::where('email', $request->email)->first();
        if($user != null){
            if ($user->role == 'admin') {
                return redirect('admin');
            } elseif ($user->role == 'bukan_admin') {
                return redirect('bukan_admin');
            }
        }
        return $next($request);
    }
}

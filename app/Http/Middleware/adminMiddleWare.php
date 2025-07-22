<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class adminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        $user = Auth::user();

        if($user->role == 'admin'){
            return $next($request);
        }

        if ($user->role == 'user'){
            return redirect()->route('index');
        }
        abort(403, 'Unauthorized action.');
    }

}

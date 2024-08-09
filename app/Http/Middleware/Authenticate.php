<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // protected function redirectTo(Request $request): ?string
    // {
    //     return $request->expectsJson() ? null : redirect('/login')->with('pesan', "Maaf, silahkan login terlebih dahulu");
    // }

    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        } else {
            Session::put('success', false);
            return redirect('/login')->with('pesan', "Maaf, silahkan login terlebih dahulu")->getTargetUrl();
        }
    }


    // public function handle($request, Closure $next, ...$guards)
    // {
    //     $this->authenticate($request, $guards);

    //     return $next($request);
    // }

    // protected function unauthenticated($request, array $guards)
    // {
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }

    //     return redirect('/login')->with('pesan', "Maaf, silahkan login terlebih dahulu");
    // }
}

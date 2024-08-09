<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string[]  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (auth()->user()->role == $role) {
            return $next($request);
        } else {
            Session::put('success', false);
            return redirect()->back()->with('pesan', "Maaf, Anda tidak diperbolehkan akses halaman ini!");
        }
    }

    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (session()->has('username')) {
    //         return $next($request);
    //     } else {
    //         return redirect('/login')->with('pesan', "Maaf, silahkan login terlebih dahulu");
    //     }
    // }

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

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if(!session()->has('LoggedUser')){
            return redirect('doe-ja')->with('fail', 'você precisa estar logado para acessar o painel');
        }
        return $next($request);
    }
}

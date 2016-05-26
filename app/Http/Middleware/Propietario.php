<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Activity;

class Propietario
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->isPropietario()){
            Activity::log('Logued in');
            return view('propietario.dash');
        }
        return $next($request);
    }
}

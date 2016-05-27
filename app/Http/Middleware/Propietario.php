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
            Activity::log('Logged in');
            if ( $this->auth->user()->isFirstLogin() ){
                $userId = $this->auth->user()->id;
                return \Redirect::route('propietario.edit', [$userId]);
            }

            return view('propietario.dash');
        }
        return $next($request);
    }
}

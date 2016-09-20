<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Activity;
use Log;

class Propietario
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        
        log::info('middleware-propietario');    
        if($this->auth->user()->isPropietario()){
            Activity::log('Logged in');
            if ( $this->auth->user()->isFirstLogin() ){
                $userId = $this->auth->user()->id;
                return \Redirect::route('propietario.edit', [$userId]);
            }
            return $next($request);
            //return view('propietario.dash');
        }
        return $next($request);
    }
}

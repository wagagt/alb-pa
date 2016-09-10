<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Activity;
use App\User;
class Propietario
{

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if($this->auth->user()->tipo= 'propietario'){
            Activity::log('Logged in');
                

            if ( $this->auth->user()->password != '$2y$10$cCOppp.HKq6h2BbfAMvc5eGbrA9ED/J97.4BEOLEl/OoAEd463ioi' ){

                return view('propietario.dash');
            }
        }
        return $next($request);
    }
}

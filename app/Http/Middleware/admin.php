<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
 use Laracasts\Flash\Flash;

class admin
{

    protected $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function __construct(Guard $auth)
    {
      $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {

      if($this->auth->user()->admin())
      {

        return $next($request);

      }else
      {

        //Flash::warning('Usuario sin privilegios para esta área');
        abort(401);
      }

    }
}

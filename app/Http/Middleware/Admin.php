<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
//use Laracasts\Flash\Flash;

class Admin
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


      if($this->auth->user()->isAdmin())
      {

          return $next($request);

      }else
      {
          //abort(401);
          return redirect()->to('admin/auth/logout');


      }

    }
}

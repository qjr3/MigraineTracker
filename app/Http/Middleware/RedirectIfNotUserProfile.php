<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfNotUserProfile
{

    protected $auth;


    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $parameterName = $request->route()->parameterNames()[0];

        $user = $request->route()->parameter($parameterName);


        if(!$this->auth->user()->hasAccessTo($user->id))
        {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}

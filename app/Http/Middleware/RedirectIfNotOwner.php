<?php

namespace App\Http\Middleware;

use Closure;
use DB;


class RedirectIfNotOwner
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $resourceName)
    {
        $object = $request->route()->parameter($resourceName);

        $user_id = DB::table($resourceName . 's')->find($object->id)->user_id;

        if ($request->user()->id != $user_id)
        {
            return redirect('/home')->with('You seem to have gotten lost...let me help you find your way home.');
        }

        return $next($request);
    }
}

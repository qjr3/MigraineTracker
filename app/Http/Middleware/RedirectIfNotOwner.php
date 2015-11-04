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
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}

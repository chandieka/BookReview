<?php

namespace App\Http\Middleware;

use Closure;
use \Auth;

class CheckOthers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->route('id');
        if($id != Auth::user()->id){
            return redirect('/');
        }
        else {
            return $next($request);
        }
    }
}

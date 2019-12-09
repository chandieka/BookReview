<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        $user = $request->user();
        if ($user == null) {
            return redirect('login');
        }
        else {
            if (! $user->isAdmin == true) {
                return redirect('/')->with('NotAdmin','Action need Root level!!!');
            }
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectToTheirPlanet
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
        $planet = $request->planet;
        if (!Auth::user()->planets->contains($planet)){
          return redirect()->route("app");
        }
        return $next($request);
    }
}

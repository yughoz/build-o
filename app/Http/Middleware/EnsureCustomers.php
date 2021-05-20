<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserManagement\User;
use App\Models\DetailCustomer;

class EnsureCustomers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(auth()->user()->customers()->first())) {
            return redirect(route('home'));
        } else{  
            return $next($request);
        }

    }
}

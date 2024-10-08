<?php

/**
  * @author Christopher Wong Jia He
  */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAuditAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::guard('admin')->user();
        if (!$admin)
            return redirect()->route(route: 'admin.login'); 

        if(is_array($admin->position->role) && in_array('audit', $admin->position->role))
            return $next($request);

        return redirect()->route('admin.profile'); 
    }
}

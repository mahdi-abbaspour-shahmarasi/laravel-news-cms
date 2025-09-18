<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Visit;
class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id=null;
        if (Auth::user()) 
        {   
            $user_id= Auth::user()->id;   
        }
        if(!Str::contains($request->url,'admin'))
        {
            Visit::create([
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'url' => $request->url(),
                'user_id'=>$user_id,
            ]);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class Apiauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('x-auth-key');
        //dd($request->header());
        $user = User::where('api_token', str_replace('Bearer ', '', $token))->first();
        if ($user) {
            Auth::login($user);
        }
        if (Auth::check() == false) {
            return response()->json(['status' => 'failed', 'message' => 'Unauthenticate'], 401);
        }
        return $next($request);
    }
}

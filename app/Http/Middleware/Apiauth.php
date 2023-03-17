<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserToken;
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
        $did = $request->device_id;
        // $user = User::where('api_token', str_replace('Bearer ', '', $token))->whereHas('token', function($q) use($did){
        //     $q->where('device_id',  $did)->whereDate('expire_at', '>', now());
        // })->first();
        $userT = UserToken::where('api_token', str_replace('Bearer ', '', $token))->whereDate('expire_at', '>', now())->with('user')->first();
        if ($userT) {
            Auth::login($userT->user);
        }
        if (Auth::check() == false) {
            return response()->json(['status' => 'failed', 'message' => 'Unauthenticate'], 401);
        }
        return $next($request);
    }
}

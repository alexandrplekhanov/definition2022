<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestAuth
{
    public function handle(Request $request, Closure $next)
    {
//        $token = $request->bearerToken();
//
//        if (!$token) {
//            return response()
//                ->json([
//                    'error' => 'Unauthorized'
//                ])
//                ->setStatusCode(401);
//        }
//        $user = User::where('token', $token)->first();
//
//        if (!$user) {
//            return response()
//                ->json([
//                    'error' => 'Unauthorized'
//                ])
//                ->setStatusCode(401);
//        }
//        Auth::login($user);

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;

class JWTMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $headers = apache_request_headers();;
        $token = $headers['Authorization'];
        if(!$token) {
            // Unauthorized response if token not there
            return [
                'status' => 401,
                'error' => 'Unauthorized'
            ];
        }
        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return [
                'status' => 400,
                'error' => 'Provided token is expired.'
            ];
        } catch(\Exception $e) {
            return [
                'status' => 400,
                'error' => 'An error while decoding token.'
            ];
        }
        
        
        $request->request->add(['auth' => ['user'=>$credentials->user]]);
        return $next($request);
    }
}
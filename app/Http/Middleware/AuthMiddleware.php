<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Google_Client;

class AuthMiddleware
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
        $idToken = $request->header('id_token');
        $client = new Google_Client(['client_id' => env('GOOGLE_CLIENT_ID')]);
        $payload = $client->verifyIdToken($idToken);
        if ($payload) {
            return $next($request);
        }
        return Controller::responseUnauthorized('Invalid ID token.');
    }
}

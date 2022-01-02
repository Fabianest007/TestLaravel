<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class VerifyAccessKey
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
        // Obtenemos el api-key que el usuario envia
        $key = substr($request->header('Authorization'), 7);
        if (User::where(['api_token' => $key])->exists()) {
            return $next($request);
        } else {
            // Si falla devolvemos el mensaje de error
            return response()->json(['error' => 'unauthorized'], 401);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware {
    public function handle($request, Closure $next)
    {
        if($request->user()){
             $email = $request->user()->email;
            if($email == 'alexsandro@oooleader.ru') {
                return $next($request);
            }
        }
        return redirect()->route('wacker');
    }
}
<?php

namespace App\Http\Middleware\Account;

use App\Verification;
use Closure;

class VerificationCodeExpired
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
        $code = Verification::where('token', $request->code)->first();
        if ( optional($code)->hasExpired() ) {
            return redirect('/')
                ->withError('Activation code expired');
        }

        return $next($request);
    }
}

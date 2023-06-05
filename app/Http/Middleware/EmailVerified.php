<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = User::query()->where('email', $request->email)->firstOrFail();

        if (empty($user->email_verified_at)) {
            return \response()->json(['message' => 'Access Denied'], 403);
        }

        return $next($request);
    }
}

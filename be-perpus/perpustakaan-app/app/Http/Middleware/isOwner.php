<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        $userOwner = Roles::where('name', 'owner')->first();

        if ($user && $user->role_id == $userOwner->id) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}

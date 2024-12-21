<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CheckSubscription
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
        // Check if the user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has an active subscription
            $subscription = $user->subscriptions;

            // If no subscription or expired, redirect to the landing page
            if (!$subscription || $subscription->ends_at->isPast()) {
                return redirect()->route('home')
                    ->with('message', 'Your subscription has expired or is inactive. Please subscribe to continue.');
            }

            // If subscription is active, proceed to the next request
            return $next($request);
        }

        // Redirect unauthenticated users to the login page or landing page
        return redirect()->route('login')->with('message', 'Please log in to access the system.');
    }
}

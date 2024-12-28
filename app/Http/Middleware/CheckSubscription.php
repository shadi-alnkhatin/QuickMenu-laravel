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

        if (Auth::check()) {
            $user = Auth::user();

            $subscription = $user->subscriptions;

            if (!$subscription || $subscription->ends_at->isPast()||$subscription->stripe_status=='disabled') {
                return redirect()->route('home')
                    ->with('success', 'Your subscription has expired or is inactive. Please subscribe to continue.');
            }

            return $next($request);
        }

        return redirect()->route('login')->with('message', 'Please log in to access the system.');
    }
}

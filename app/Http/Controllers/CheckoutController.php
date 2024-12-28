<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request,string $plan)
    {
        $user = Auth::user();
        $subscription = $user->subscriptions;
        if ($subscription && !($subscription->ends_at->isPast())&& $subscription->stripe_status=='active') {
            return redirect()->route('home')
                ->with('success', 'You have a subscription and it is active. you can go to your dashboard');
        }
        return $request->user()
        ->newSubscription('prod_RGS8vMT25IjPpf', $plan)
        ->checkout([
            'success_url' => route('subscription.success'),
            'cancel_url' => route('home'). '?status=cancelSubscription',
        ]);
    }
}

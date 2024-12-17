<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Subscription;


class StaticsController extends Controller
{
    public function getTotalProfits()
    {
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $payments =PaymentIntent::all(['limit' => 100]); // Fetch latest 100 payments

    $totalProfit = 0;
    foreach ($payments->data as $payment) {
        if ($payment->status == 'succeeded') {
            $totalProfit += $payment->amount_received / 100; // Convert from cents
        }
    }

    return $totalProfit;
    }

    public function getSubscribersCount()
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    $subscriptions = Subscription::all(['limit' => 100]); // Adjust the limit as needed

    $activeCount = 0;
    foreach ($subscriptions->data as $subscription) {
        if ($subscription->status == 'active') {
            $activeCount++;
        }
    }

    return $activeCount;
}
}

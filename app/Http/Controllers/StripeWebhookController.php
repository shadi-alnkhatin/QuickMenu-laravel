<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeWebhookController extends CashierController {
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $id = Auth::id();

        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            // Construct the event object
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);

            // Handle the event
            switch ($event->type) {
                case 'invoice.payment_succeeded':
                    Stripe::setApiKey(env('STRIPE_SECRET'));
                    $invoice = $event->data->object;
                    $subscriptionId = $invoice->subscription;
                    $subscriptionDetails = \Stripe\Subscription::retrieve($subscriptionId);
                    $user = User::where('stripe_id', $subscriptionDetails->customer)->first();
                    $totalAmount = 0;

                    $lineItems = \Stripe\Invoice::retrieve($invoice->id)->lines->data;
                    foreach ($lineItems as $lineItem) {
                        $amountPaid = $lineItem->amount / 100; // Convert from cents to dollars
                        $totalAmount += $amountPaid;

                        // Optionally, save each item to the database
                        // SubscriptionItem::create([
                        //     'subscription_id' => $subscriptionId,
                        //     'description' => $lineItem->description,
                        //     'amount' => $amountPaid,
                        // ]);
                    }

                    // Save the total invoice amount to the database
                    Subscription::create([
                        'stripe_id' => $subscriptionId,
                        'user_id' => $user->id,
                        'stripe_status' => $subscriptionDetails->status,
                        'type' => 'premium',
                        'ends_at' => Carbon::createFromTimestamp($subscriptionDetails->current_period_end),
                        'stripe_price' => $totalAmount, // Total price from invoice
                    ]);



                    break;

                case 'customer.subscription.created':
                case 'customer.subscription.updated':
                        // Stripe::setApiKey(env('STRIPE_SECRET'));

                        // $subscription = $event->data->object;
                        // $subscriptionDetails = \Stripe\Subscription::retrieve($subscription->id); // Get full details
                        // $user = User::where('stripe_id', $subscription->customer)->first();
                        // // Log subscription data for debugging
                        // Log::info('Subscription created or updated', ['subscription' => $subscriptionDetails]);

                        // // Save to database
                        // Subscription::create([
                        //     'stripe_id' => $subscriptionDetails->id,
                        //     'user_id' => $user->id, // You may need to map this to your user
                        //     'stripe_status' => $subscriptionDetails->status,
                        //     'type' => 'premium', // Define your subscription type
                        //     'ends_at' => Carbon::createFromTimestamp($subscriptionDetails->current_period_end),
                        // ]);
                        // break;

                // Add more cases for other events if needed
                default:
                    // Unexpected event type
                    return response('Event not handled', 400);
            }

            return view('welcome');

        } catch (SignatureVerificationException $e) {
            return response('Webhook signature verification failed', 400);
        }
    }


}

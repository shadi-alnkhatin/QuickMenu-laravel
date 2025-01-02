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
                default:
                    // Unexpected event type
                    return response('Event not handled', 400);
            }

            return response()->json(['status' => 'success'], 200);
        } catch (SignatureVerificationException $e) {
            return response('Webhook signature verification failed', 400);
        }
    }


}

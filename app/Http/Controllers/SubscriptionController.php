<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){
        $subscriptions = Subscription::with('user')
        ->whereHas('user', function ($query) {
            $query->where('role', '!=', 'admin');
        })
        ->get();
            return view('subscriptions', compact('subscriptions'));
    }
    public function updateStatus(Request $request, $id)
    {
        $subscription = Subscription::findOrFail($id);

        $request->validate([
            'status' => ['required', 'string', 'in:active,disabled'],
        ]);

        $subscription->stripe_status = $request->status;
        $subscription->save();

        return response()->json(['message' => 'Status updated successfully'], 200);
    }
}

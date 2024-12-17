<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request,string $plan)
    {
        return $request->user()
        ->newSubscription('prod_RGS8vMT25IjPpf', $plan)
        ->checkout([
            'success_url' => route('menu.index'),
            'cancel_url' => route('profile'),
        ]);
    }
}

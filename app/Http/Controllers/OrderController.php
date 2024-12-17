<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        dd("Order controller Called");
        // Validate the input
        $validated = $request->validate([
            'user_id' => 'required',
            'menu_id' => 'required',
            'total_price' => 'required',
            'items' => 'required|array',
            'items.*.dish_id' => 'required|integer',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ]);

        dd($validated);


        $order = Order::create([
            'user_id' => $validated['user_id'],
            'menu_id' => $validated['menu_id'],
            'total_price' => $validated['total_price'],
        ]);


        foreach ($validated['items'] as $item) {
            $order->items()->create([
                'menu_item_id' => $item['dish_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }


    }

}

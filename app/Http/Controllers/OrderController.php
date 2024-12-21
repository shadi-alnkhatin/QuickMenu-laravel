<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {

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

    public function viewOrders(Request $request)
    {
        $userId= Auth::id();
        // Display all menus
        $menus = Menu::where('user_id',$userId)->get();
        $menuId = $request->get('menu_id'); // Selected menu ID from request

        // Retrieve orders for the selected menu or all if none selected
        $orders = Order::when($menuId, function ($query, $menuId) {
            return $query->where('menu_id', $menuId);
        })->get();

        return view('resturant-orders', compact('orders', 'menus', 'menuId'));
    }

}

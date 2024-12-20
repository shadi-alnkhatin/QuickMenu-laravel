<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{

    public function store(Request $request){
        $validated= $request->validate([
            'MenuItemName' => 'required|min:3',
            'MenuItemDescription' => 'required|min:10',
            'MenuItemPrice' => 'required|numeric|min:1',
            'category_id' => 'required',
            'menu_id' => 'required',
            'available' => 'required',
            'ItemImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);


        $itemImage= $request->file('ItemImage')->store('items_images','public');
        MenuItem::create([
            'name' => $validated['MenuItemName'],
            'description' => $validated['MenuItemDescription'],
            'price' => $validated['MenuItemPrice'],
            'category_id' => $validated['category_id'],
            'menu_id' => $validated['menu_id'],
            'available' => $validated['available'],
            'image_url'=>$itemImage
        ]);

        return redirect()->back()->with('success', 'Menu item added successfully!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return redirect()->back()->with('success', 'Menu item Addeed successfully!');

    }

    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);


        return response()->json(data: $menuItem);
    }


    public function update(Request $request, $id)
    {

    // Validate the input data
    $validated = $request->validate([
        'ItemName' => 'required|min:3',
        'ItemDescription' => 'required|min:10',
        'ItemPrice' => 'required|numeric|min:1',
        'available' => 'required',
        'ItemImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ItemImage is optional in update
    ]);

    // Find the menu item by ID
    $menuItem = MenuItem::findOrFail($id);

    // Update the item
    $menuItem->name = $validated['ItemName'];
    $menuItem->description = $validated['ItemDescription'];
    $menuItem->price = $validated['ItemPrice'];
    $menuItem->available = $validated['available'];

    if ($request->hasFile('ItemImage')) {
        // Delete the existing image if it exists
        Storage::disk('public')->delete('items_images/'.$menuItem->image_url);
        $itemImage = $request->file('ItemImage')->store('items_images', 'public');
        $menuItem->image_url = $itemImage;
    }

    // Save the updated item
    $menuItem->save();

    return redirect()->back()->with('success', 'Menu item Updated successfully!');
}
public function destroy($id){
    $userID=Auth::id();

    // Find the menu item by ID
    $menuItem = MenuItem::findOrFail($id);

    //check if the item belong to a menu that for this user !
    if($menuItem->menu->user_id!=$userID){
        return redirect()->back()->with('error', 'You can not delete this item!');
    }


    // Delete the menu item
    $menuItem->delete();

    // Delete the image from storage
    Storage::disk('public')->delete('items_images/'.$menuItem->image_url);

    return redirect()->back()->with('success', 'Menu item Deleted Successfully');
}

}

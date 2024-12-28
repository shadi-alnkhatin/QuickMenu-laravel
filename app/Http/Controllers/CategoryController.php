<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'categoryName' => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id', // Ensure menu_id exists in the menus table
        ]);

        // Create the category
        $category = Category::create([
            'name' => $request->categoryName,
            'menu_id' => $request->menu_id,
        ]);

        // Redirect to the menu details page with the given menu_id
        return redirect()->route('menu.details', ['id' => $request->menu_id])
                         ->with('success', 'Category added successfully.');
    }
    public function edit($id)
    {
    $category = Category::findOrFail($id);
    return response()->json($category);
    }

    public function update(Request $request, $id)
    {
    // Validate the request
    $v=$request->validate([
        'EditcategoryName' => 'required|string|max:255',
    ]);


    // Find the category by ID
    $category = Category::findOrFail($id);

    // Update the category
    $category->update([
        'name' => $request->EditcategoryName,
    ]);
    $category->save();

    return redirect()->back()->with('success', 'Category Updated successfully!');

    }
 public function destroy($id){
    $userID=Auth::id();
    // Delete a category
    $category=Category::findOrFail($id);
    if($category->menu->user_id!=$userID){
        return redirect()->back()->with('error', 'You can not delete this category.');
    }
    $category->delete();
    return redirect()->back()->with('success', 'Category deleted successfully!');
 }

}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{

    //

    public function index(){
        // Display all menus
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }

    public function create(){
        // Display form to create a new menu
        return view('add-menu');
    }


public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'address' => 'required|string|max:255',
        'phone_number' => ['required', 'regex:/^(\+?\d{1,4}[\s-]?)?\(?\d{1,3}?\)?[\s-]?\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,9}$/'],
        'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $logoPath = $request->file('logo')->store('logos', 'public');
    $coverPath = $request->file('cover')->store('covers', 'public');

    // Get the authenticated user
    $user = Auth::user();

// Create a menu record linked to the user
$user->menus()->create([ // Use menus() (the relationship method) instead of menus (the collection)
    'name' => $request->input('name'),
    'description' => $request->input('description'),
    'address' => $request->input('address'),
    'phone_number' => $request->input('phone_number'),
    'logo_url' => $logoPath,
    'cover_url' => $coverPath,
]);

    // Redirect to the menu list page with a success message
    return redirect()->route('menu.index');
}

public function edit($id){
    // Display form to edit a menu
    $user = Auth::user();
    $menu =$user->menus()->find($id);
    return view('edit-menu', compact('menu'));

}
public function details($id)
{
    // Get the authenticated user
    $user = Auth::user();
    $menu = $user->menus()->findOrFail($id);
    $categories = $menu->categories;

    // Return the menu details view with menu and categories
    return view('menu-details', compact('menu', 'categories'));
}


public function update(Request $request, $id){

}

public function destroy($id){
    // Delete a menu
    $user = Auth::user();
    $menu = $user->menus()->find($id);
    $menu->delete();

    // Redirect to the menu list page with a success message
    return redirect()->route('menu.index');
}

}

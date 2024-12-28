<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Storage;

class MenuController extends Controller
{


    public function index(){
        $userId= Auth::id();
        // Display all menus
        $menus = Menu::where('user_id',$userId)->get();
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
        'primary_color' => 'required|string|max:7',
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
    'primary_color'=>$request->input('primary_color')

]);

    // Redirect to the menu list page with a success message
    return redirect()->route('menu.index')->with('success', 'Menu Created Successfully');
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
    $categories = $menu->categories()->with('menuItems')->get();

    // Return the menu details view with menu and categories
    return view('menu-details', compact('menu', 'categories'));
}


public function update(Request $request, $id)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'address' => 'required|string|max:255',
        'phone_number' => ['required', 'regex:/^(\+?\d{1,4}[\s-]?)?\(?\d{1,3}?\)?[\s-]?\d{1,4}[\s-]?\d{1,4}[\s-]?\d{1,9}$/'],
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'primary_color' => 'required|string|max:7',
    ]);

    // Find the menu record
    $menu = Auth::user()->menus()->findOrFail($id);

    // Handle file uploads for logo and cover
    $logoPath = $menu->logo_url;
    if ($request->hasFile('logo')) {

        if ($menu->logo_url) {
            FacadesStorage::disk('public')->delete('logos/'.$menu->logo_url);;
        }
        $logoPath = $request->file('logo')->store('logos', 'public');
    }

    $coverPath = $menu->cover_url;
    if ($request->hasFile('cover')) {

        if ($menu->cover_url) {
            FacadesStorage::disk('public')->delete('covers/'.$menu->cover_url);
        }
        $coverPath = $request->file('cover')->store('covers', 'public');
    }

    // Update menu data
    $menu->update([
        'name' => $request->input('name'),
        'description' => $request->input('description'),
        'address' => $request->input('address'),
        'phone_number' => $request->input('phone_number'),
        'logo_url' => $logoPath,
        'cover_url' => $coverPath,
        'primary_color' => $request->input('primary_color'),
    ]);


    return redirect()->route('menu.index')->with('success', 'Menu updated successfully!');
}


public function destroy($id){
    // Delete a menu
    $user = Auth::user();
    $menu = $user->menus()->find($id);
    $menu->delete();


    return redirect()->route('menu.index')->with('success', 'Menu Deleted Successfully');
}

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::where('deleted', false)->orderBy('id', 'desc')->get();
        return view('users', compact('users'));
    }
    public function store(Request $request)
    {
        // Validate user input
        $validate = $request->validate([
            'UserName' => 'required|string|max:30',
            'UserEmail' => 'required|string|email|max:50|unique:users,email',
            'UserPassword' => 'required|string|min:8|max:20',
            'UserRole' => 'required|string',
        ]);

        // Create and save the new user
        User::create([
            'name' => $validate['UserName'],
            'email' => $validate['UserEmail'],
            'password' => bcrypt($validate['UserPassword']), // Hash the password
            'role' => $validate['UserRole'],
        ]);

        // Redirect to the users list with a success message
        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }
    public function update(Request $request, $id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Validate the request data
        $validate = $request->validate([
            'UserName' => 'required|string|max:30',
            'UserEmail' => 'required|string|email|max:50|unique:users,email,' . $id,
            'UserRole' => 'required|string',
        ]);

        // Update user data
        $user->update([
            'name' => $validate['UserName'],
            'email' => $validate['UserEmail'],
            'role' => $validate['UserRole'],
        ]);

        // Redirect with a success message
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id){
        // Find the user by ID
        $user = User::findOrFail($id);

        // Soft delete the user
        $user->update(['deleted' => true]);

        // Redirect with a success message
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}

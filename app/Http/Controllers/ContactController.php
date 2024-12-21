<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function show(){
        $user=Auth::user();

        return view('contact-view',compact('user'));
    }
    public function store(Request $request)
    {

        // Validate the form data
       $v= $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Thank you for contacting us. We will get back to you shortly.');
    }
    public function index(){
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('contact-admin',compact('contacts'));
    }

}

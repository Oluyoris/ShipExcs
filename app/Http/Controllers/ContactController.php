<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        // Format the message and append to file
        $messageData = sprintf(
            "First Name: %s\nLast Name: %s\nEmail: %s\nPhone: %s\nMessage: %s\n---\n",
            $request->first_name,
            $request->last_name,
            $request->email,
            $request->phone,
            $request->message
        );

        Storage::append('messages.txt', $messageData);

        return redirect()->back()->with('success', 'Thank you for your message! It has been received.');
    }

    public function messages()
    {
        $messages = Storage::exists('messages.txt') ? explode('---', Storage::get('messages.txt')) : [];
        return view('admin.messages', compact('messages'));
    }
}
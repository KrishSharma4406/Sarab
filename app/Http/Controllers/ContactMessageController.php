<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{

public function index()
{
    $messages = ContactMessage::latest()->paginate(10);

    return view('Admin.contact_message.index', compact('messages'));
}

public function create()
{
    return view('frontend.contact');
}

public function show(ContactMessage $contact_message)
{
    $message = $contact_message;

    return view('Admin.contact_message.show', compact('message'));
}
public function store(Request $request)
{
    ContactMessage::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    return back()->with('success', 'Message Sent Successfully');
}
}

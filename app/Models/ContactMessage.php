<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    public function index()
{
    $messages = ContactMessage::latest()->paginate(10);

    return view('admin.contact_message.index',
        compact('messages'));
}

public function show(ContactMessage $contact_message)
{
    $message = $contact_message;

    return view('admin.contact_message.show',
        compact('message'));
}

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message'
    ];
}

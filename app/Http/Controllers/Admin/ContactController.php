<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactController extends Controller
{
    public function index()
{
    $contacts = Contacts::latest()->get();

    return view('Admin.contact.index', compact('contacts'));
}

    public function create()
    {
        return view('Admin.contact.create');
    }

    public function store(Request $request)
    {
        Contacts::create($request->all());

        return redirect()
            ->route('contact.index')
            ->with('success','Contact Added Successfully');
    }

    public function edit($id)
    {
        $contact = Contacts::findOrFail($id);

        return view('Admin.contact.edit', compact('contact'));
    }

    public function update(Request $request,$id)
    {
        $contact = Contacts::findOrFail($id);

        $contact->update($request->all());

        return redirect()
            ->route('contact.index')
            ->with('success','Contact Updated Successfully');
    }

   public function destroy($id)
{
    Contacts::findOrFail($id)->delete();

    return redirect()
        ->route('contacts.index')
        ->with('success', 'Contact deleted successfully');
}
}
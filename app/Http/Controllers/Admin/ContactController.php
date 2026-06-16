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
        Contacts::create([
    'company_name' => $request->company_name,
    'phone' => $request->phone,
    'email' => $request->email,
    'opening_hours' => $request->opening_hours,
    'address' => $request->address,
    'google_map' => $request->google_map,
    'facebook' => $request->facebook,
    'instagram' => $request->instagram,
    'twitter' => $request->twitter,
    'linkedin' => $request->linkedin,
    'youtube' => $request->youtube,
    'group_dining' => $request->group_dining
]);

        return redirect()
            ->route('contacts.index')
            ->with('success','Contact Added Successfully');
    }

    public function edit($id)
    {
        $contact = Contacts::findOrFail($id);

        return view('Admin.contact.edit', compact('contact'));
    }

    public function update(Request $request,$id)
    {
        $contacts = Contacts::findOrFail($id);

        $contacts->update([
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'opening_hours' => $request->opening_hours,
            'address' => $request->address,
            'google_map' => $request->google_map,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'group_dining' => $request->group_dining
        ]);

        return redirect()
            ->route('contacts.index')
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
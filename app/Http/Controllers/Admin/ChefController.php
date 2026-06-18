<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::latest()->get();
        return view('admin.chefs.index', compact('chefs'));
    }

    public function create()
    {
        return view('admin.chefs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'experience' => 'required',
            'image' => 'required|image'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/chefs'), $imageName);
        }

        Chef::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'experience' => $request->experience,
            'image' => $imageName,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('chefs.index');
    }

    public function edit($id)
    {
        $chef = Chef::findOrFail($id);
        return view('admin.chefs.edit', compact('chef'));
    }

    public function update(Request $request, $id)
    {
        $chef = Chef::findOrFail($id);

        $imageName = $chef->image;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/chefs'), $imageName);
        }

        $chef->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'experience' => $request->experience,
            'image' => $imageName,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('chefs.index');
    }

    public function destroy($id)
    {
        Chef::findOrFail($id)->delete();
        return back();
    }
}
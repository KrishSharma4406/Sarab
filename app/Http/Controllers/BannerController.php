<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $banners = Banner::latest()->get();

    return view('banner.index', compact('banners'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'image' => 'required|image'
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(
        public_path('uploads/banners'),
        $imageName
    );

    Banner::create([
        'title' => $request->title,
        'image' => $imageName,
        'status' => $request->status
    ]);

    return redirect()
        ->route('banners.index')
        ->with('success','Banner created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'status' => 'required'
    ]);

    $banner = Banner::findOrFail($id);

    $banner->title = $request->title;
    $banner->status = $request->status;

    if ($request->hasFile('image')) {

        $image = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads/banners'),
            $image
        );

        $banner->image = $image;
    }

    $banner->save();

    return redirect()
            ->route('banner.index')
            ->with('success','Banner Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //
    }
}

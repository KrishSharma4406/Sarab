<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $categories = Category::withCount('products')
                    ->latest()
                    ->get();

    return view('admin.category.index', compact('categories'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'image' => 'required|image'
    ]);

    $imageName = time().'.'.$request->image->extension();

    $request->image->move(
        public_path('uploads/categories'),
        $imageName
    );

    Category::create([
        'name' => $request->name,
        'image' => $imageName,
        'is_active' => $request->is_active
    ]);

    return redirect()
            ->route('categories.index')
            ->with('success','Category created successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.category.edit', [
            'category' => Category::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required'
    ]);

    $image = $category->image;

    if($request->hasFile('image'))
    {
        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('uploads/categories'),
            $imageName
        );

        $image = $imageName;
    }

    $category->update([
        'name' => $request->name,
        'image' => $image,
        'is_active' => $request->is_active
    ]);

    return redirect()
            ->route('categories.index')
            ->with('success','Category updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

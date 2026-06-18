<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display all blogs
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Store blog
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'        => 'required',
            'category'     => 'required',
            'author'       => 'required',
            'publish_date' => 'required',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time() . '.' .
                         $request->image->extension();

            $request->image->move(
                public_path('uploads/blogs'),
                $imageName
            );
        }

        Blog::create([
            'title'        => $request->title,
            'category'     => $request->category,
            'author'       => $request->author,
            'comments'     => $request->comments ?? 0,
            'publish_date' => $request->publish_date,
            'description'  => $request->description,
            'image'        => $imageName,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Show single blog
     */
    public function show(Blog $blog)
    {
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show edit form
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update blog
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'        => 'required',
            'category'     => 'required',
            'author'       => 'required',
            'publish_date' => 'required',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imageName = $blog->image;

        if ($request->hasFile('image')) {

            if (
                $blog->image &&
                file_exists(
                    public_path('uploads/blogs/' . $blog->image)
                )
            ) {
                unlink(
                    public_path('uploads/blogs/' . $blog->image)
                );
            }

            $imageName = time() . '.' .
                         $request->image->extension();

            $request->image->move(
                public_path('uploads/blogs'),
                $imageName
            );
        }

        $blog->update([
            'title'        => $request->title,
            'category'     => $request->category,
            'author'       => $request->author,
            'comments'     => $request->comments ?? 0,
            'publish_date' => $request->publish_date,
            'description'  => $request->description,
            'image'        => $imageName,
            'status'       => $request->status,
        ]);

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Delete blog
     */
    public function destroy(Blog $blog)
    {
        if (
            $blog->image &&
            file_exists(
                public_path('uploads/blogs/' . $blog->image)
            )
        ) {
            unlink(
                public_path('uploads/blogs/' . $blog->image)
            );
        }

        $blog->delete();

        return redirect()
            ->route('blogs.index')
            ->with('success', 'Blog deleted successfully.');
    }
}
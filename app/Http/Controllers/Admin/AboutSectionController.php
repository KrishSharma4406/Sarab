<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use App\Models\About;

class AboutSectionController extends Controller
{
    public function index()
{
    $abouts = AboutSection::latest()->get();

    return view('Admin.about.index', compact('abouts'));
}

    public function create()
    {
        return view('Admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('main_image'))
        {
            $file = $request->file('main_image');
            $name = time().'_main.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads/about'), $name);

            $data['main_image'] = $name;
        }

        if($request->hasFile('small_image'))
        {
            $file = $request->file('small_image');
            $name = time().'_small.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads/about'), $name);

            $data['small_image'] = $name;
        }

        AboutSection::create($data);

        return redirect()->route('about.index');
    }

    public function edit($id)
    {
        $about = AboutSection::findOrFail($id);

        return view('Admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutSection::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('main_image'))
        {
            $file = $request->file('main_image');
            $name = time().'_main.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads/about'), $name);

            $data['main_image'] = $name;
        }

        if($request->hasFile('small_image'))
        {
            $file = $request->file('small_image');
            $name = time().'_small.'.$file->getClientOriginalExtension();

            $file->move(public_path('uploads/about'), $name);

            $data['small_image'] = $name;
        }

        $about->update($data);

        return redirect()->route('about.index');
    }
}
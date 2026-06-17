<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodShowcase;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Menu;

class FoodShowcaseController extends Controller
{
    public function edit()
    {
        $food = FoodShowcase::first();

        return view('admin.food_showcase.edit', compact('food'));
    }

    public function create()
{
    return view('admin.food_showcase.create');
}

public function store(Request $request)
{
    $food = new FoodShowcase();

    $food->subtitle = $request->subtitle;
    $food->title = $request->title;
    $food->highlight_text = $request->highlight_text;

    for ($i = 1; $i <= 5; $i++) {

        if ($request->hasFile("image$i")) {

            $image = $request->file("image$i");

            $filename = time().'_'.$i.'.'.$image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/foodshowcase'),
                $filename
            );

            $food->{"image$i"} = $filename;
        }
    }

    $food->save();

    return redirect()
        ->route('foods_showcase.index')
        ->with('success', 'Food Showcase Created Successfully');
}

    public function index()
{
    $foods = FoodShowcase::all();

    return view('admin.food_showcase.index', compact('foods'));
}

    public function update(Request $request)
    {
        $food = FoodShowcase::first() ?? new FoodShowcase();

        $food->subtitle = $request->subtitle;
        $food->title = $request->title;
        $food->highlight_text = $request->highlight_text;

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile("image$i")) {

                $image = $request->file("image$i");
                $name = time().'_'.$i.'.'.$image->getClientOriginalExtension();

                $image->move(public_path('uploads/foodshowcase'), $name);

                $food->{"image$i"} = $name;
            }
        }

        $food->save();

        return back()->with('success', 'Food Showcase Updated Successfully');
    }
}
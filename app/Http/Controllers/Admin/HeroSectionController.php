<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();

        return view('admin.hero-section.index', compact('hero'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_line_1' => 'nullable|string',
            'title_highlight' => 'nullable|string',
            'title_line_2' => 'nullable|string',
            'description' => 'nullable|string',

            'card1_title' => 'nullable|string',
            'card1_subtitle' => 'nullable|string',

            'card2_title' => 'nullable|string',
            'card2_subtitle' => 'nullable|string',

            'card3_title' => 'nullable|string',
            'card3_subtitle' => 'nullable|string',
        ]);

         $hero = HeroSection::firstOrNew(['id' => 1]);

    $hero->title_line_1 = $request->title_line_1;
    $hero->title_highlight = $request->title_highlight;
    $hero->title_line_2 = $request->title_line_2;
    $hero->description = $request->description;

    $hero->card1_title = $request->card1_title;
    $hero->card1_subtitle = $request->card1_subtitle;

    $hero->card2_title = $request->card2_title;
    $hero->card2_subtitle = $request->card2_subtitle;

    $hero->card3_title = $request->card3_title;
    $hero->card3_subtitle = $request->card3_subtitle;


        $hero->save();

            return redirect()->route('hero-section.edit', $hero->id)->with('success', 'Hero Section Updated Successfully');
            dd($hero);
    }

    public function create()
{
    $hero = new HeroSection();

    return view('admin.hero-section.create', compact('hero'));
}

public function edit()
{
    $hero = HeroSection::first();

    return view('admin.hero-section.edit', compact('hero'));
}
}
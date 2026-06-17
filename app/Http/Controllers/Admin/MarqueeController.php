<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marquee;
use Illuminate\Http\Request;

class MarqueeController extends Controller
{
    public function index()
    {
        $marquees = Marquee::latest()->get();

        return view('Admin.marquee.index', compact('marquees'));
    }

    public function create()
    {
        return view('Admin.marquee.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        Marquee::create([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()
            ->route('marquees.index')
            ->with('success', 'Added Successfully');
    }

    public function edit(Marquee $marquee)
    {
        return view('Admin.marquee.edit', compact('marquee'));
    }

    public function update(Request $request, Marquee $marquee)
    {
        $marquee->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        return redirect()
            ->route('marquees.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy(Marquee $marquee)
    {
        $marquee->delete();

        return back();
    }
}
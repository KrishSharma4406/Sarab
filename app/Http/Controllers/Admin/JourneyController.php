<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Journey;
use Illuminate\Http\Request;

class JourneyController extends Controller
{
    public function index()
    {
        $journeys = Journey::orderBy('position')->get();
        return view('admin.journey.index', compact('journeys'));
    }

    public function create()
    {
        return view('admin.journey.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        Journey::create($request->all());

        return redirect()->route('journey.index')
            ->with('success','Journey Added Successfully');
    }

    public function edit(Journey $journey)
    {
        return view('admin.journey.edit', compact('journey'));
    }

    public function update(Request $request, Journey $journey)
    {
        $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $journey->update($request->all());

        return redirect()->route('journey.index')
            ->with('success','Journey Updated Successfully');
    }

    public function destroy(Journey $journey)
    {
        $journey->delete();

        return back()->with('success','Deleted Successfully');
    }
}
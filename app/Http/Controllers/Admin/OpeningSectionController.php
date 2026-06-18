<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpeningSection;
use Illuminate\Http\Request;

class OpeningSectionController extends Controller
{
    public function index()
    {
        $hours = OpeningSection::latest()->get();

        return view('admin.opening-hours.index', compact('hours'));
    }

    public function create()
    {
        return view('admin.opening-hours.create');
    }

    public function store(Request $request)
    {
        OpeningSection::create([
            'day_name' => $request->day_name,
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
            'is_closed' => $request->has('is_closed'),
        ]);

        return redirect()->route('opening-hours.index')
            ->with('success','Added Successfully');
    }

    public function edit($id)
    {
        $hour = OpeningSection::findOrFail($id);

        return view('admin.opening-hours.edit', compact('hour'));
    }

    public function update(Request $request, $id)
    {
        $hour = OpeningSection::findOrFail($id);

        $hour->update([
            'day_name' => $request->day_name,
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
            'is_closed' => $request->has('is_closed'),
        ]);

        return redirect()->route('opening-hours.index')
            ->with('success','Updated Successfully');
    }

    public function destroy($id)
    {
        OpeningSection::findOrFail($id)->delete();

        return back()->with('success','Deleted Successfully');
    }
}
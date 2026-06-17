<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OfferSection;

class OfferSectionController extends Controller
{
    /**
     * Display listing
     */
    public function index()
    {
        $offers = OfferSection::latest()->get();

        return view('admin.offer.index', compact('offers'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.offer.create');
    }

    /**
     * Store new record
     */
    public function store(Request $request)
{
    $data = $request->all();

    if ($request->hasFile('image')) {

        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('uploads/offers'), $imageName);

        $data['image'] = $imageName;
    }

    OfferSection::create($data);

    return redirect()->back()->with('success','Saved');
}

    /**
     * Show edit form
     */
    public function edit($id)
    {
        $offer = OfferSection::findOrFail($id);

        return view('admin.offer.edit', compact('offer'));
    }

    /**
     * Update record
     */
    public function update(Request $request, $id)
    {
        $offer = OfferSection::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'highlight_text' => 'required',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            if (
                $offer->image &&
                file_exists(public_path('uploads/offers/' . $offer->image))
            ) {
                unlink(public_path('uploads/offers/' . $offer->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/offers'), $imageName);

            $data['image'] = $imageName;
        }

        $offer->update($data);

        return redirect()
            ->route('offer.index')
            ->with('success', 'Offer section updated successfully.');
    }

    /**
     * Delete record
     */
    public function destroy($id)
    {
        $offer = OfferSection::findOrFail($id);

        if (
            $offer->image &&
            file_exists(public_path('uploads/offers/' . $offer->image))
        ) {
            unlink(public_path('uploads/offers/' . $offer->image));
        }

        $offer->delete();

        return redirect()
            ->route('offer.index')
            ->with('success', 'Offer section deleted successfully.');
    }
}
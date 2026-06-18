<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'designation'=>'nullable',
            'message'=>'required',
            'rating'=>'required',
            'image'=>'nullable|image'
        ]);

        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/feedback'),
                $image
            );

            $data['image'] =
                'uploads/feedback/'.$image;
        }

        $data['status'] = 0;

        Feedback::create($data);

        return back()
            ->with('success',
            'Feedback submitted successfully');
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->get();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);

        return view('admin.feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $data = $request->validate([
            'name'=>'required',
            'designation'=>'nullable',
            'message'=>'required',
            'rating'=>'required',
            'image'=>'nullable|image'
        ]);

        if ($request->hasFile('image')) {

            $image = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('uploads/feedback'),
                $image
            );

            $data['image'] =
                'uploads/feedback/'.$image;
        }

        $feedback->update($data);

        return redirect()->route('feedbacks.index')
            ->with('success','Feedback updated successfully');
    }

    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();

        return back()->with('success','Feedback deleted successfully');
    }

    public function approve($id)
    {
        $feedback = Feedback::findOrFail($id);

        $feedback->update(['status' => 1]);

        return back()->with('success','Feedback approved successfully');
    }
}
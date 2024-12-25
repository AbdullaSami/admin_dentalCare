<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPages = request('perPage',10);
        $search = request('search','');
        $sortField = request('sort_field', 'id');
        $sortDirection = request('sort_direction', 'desc');
        $feedbacks = Feedback::query()
        ->where('name','like', "%{$search}%")
        ->orderBy($sortField, $sortDirection)
        ->paginate($perPages);

        return view("feedbacks.feedback_table", compact("feedbacks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("feedbacks.feedback_create");
    }
    public function shareFeedback()
    {
        return view("feedbacks.feedback_share");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeedbackRequest $request)
    {
    // Validate the request data
    $data = $request->all();

    // Handle image upload (if applicable)
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $filename = time() . '_' . $image->getClientOriginalName();
        $relativePath = $image->storeAs('public/feedback_images', $filename);
        $data['img'] = URL::to(Storage::url($relativePath));

    }

    // Create the feedback
    try {
        $feedback = Feedback::create($data);
        return redirect()->route('main-page.index')->with('success', 'feedback created successfully!');
    } catch (\Exception $e) {
        // Handle exceptions and provide informative error messages
        return redirect()->back()->withErrors(['error' => 'Failed to create feedback: ' . $e->getMessage()]);
    }
    }
    public function feedback(StoreFeedbackRequest $request)
    {
        // Validate the request data
    $data = $request->all();

    // Handle image upload (if applicable)
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $filename = time() . '_' . $image->getClientOriginalName();
        $relativePath = $image->storeAs('public/feedback_images', $filename);
        $data['img'] = URL::to(Storage::url($relativePath));

    }

    // Create the feedback
    try {
        $feedback = Feedback::create($data);
        return redirect()->route('success')->with('success', 'feedback created successfully!');
    } catch (\Exception $e) {
        dd($e);
        // Handle exceptions and provide informative error messages
        return redirect()->back()->withErrors(['error' => 'Failed to create feedback: ' . $e->getMessage()]);
    }
    }
    /**
     * Display the specified resource.
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feedback $feedback)
    {
        return view('feedbacks.feedback_edit', compact("feedback"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeedbackRequest $request, $id)
    {

        // Get the feedback data by id
        $feedback = Feedback::findOrFail($id);

        // Validate the request data
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            // Generate a unique filename
            $filename = time() . '_' . $image->getClientOriginalName();

            // Upload the image to storage
            $relativePath = $image->storeAs('public/feedback_images', $filename);

            // Update the feedback data
            $feedback->update([
                ...$data,
                'img' => URL::to(Storage::url($relativePath)),
            ]);

            // Delete the old image if it exists
            if ($feedback->img && $feedback->img !== URL::to(Storage::url($relativePath))) {
                Storage::delete($feedback->img);
            }
        } else {
            // Update the feedback data without changing the image
            $feedback->update($data);
        }

        return redirect()->back()->with('success', 'feedback Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return redirect('feedback')->with('success', 'feedback deleted successfully!');
    }
}

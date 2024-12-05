<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Http\Requests\StoreEventsRequest;
use App\Http\Requests\UpdateEventsRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("events.event_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventsRequest $request)
    {
                // Validate the request data
    $data = $request->all();

    // Handle image upload (if applicable)
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $filename = time() . '_' . $image->getClientOriginalName();
        $relativePath = $image->storeAs('public/event_images', $filename);
        $data['img'] = URL::to(Storage::url($relativePath));

    }

    // Create the event
    try {
        $event = Events::create($data);
        return redirect()->route('main-page.index')->with('success', 'event created successfully!');
    } catch (\Exception $e) {
        // Handle exceptions and provide informative error messages
        return redirect()->back()->withErrors(['error' => 'Failed to create event: ' . $e->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(Events $events)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Events $event)
    {
        return view('events.event_edit', compact('event'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventsRequest $request, $id)
    {

        // Get the event data by id
        $event = Events::findOrFail($id);

        // Validate the request data
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            // Generate a unique filename
            $filename = time() . '_' . $image->getClientOriginalName();

            // Upload the image to storage
            $relativePath = $image->storeAs('public/event_images', $filename);

            // Update the event data
            $event->update([
                ...$data,
                'img' => URL::to(Storage::url($relativePath)),
            ]);

            // Delete the old image if it exists
            if ($event->img && $event->img !== URL::to(Storage::url($relativePath))) {
                Storage::delete($event->img);
            }
        } else {
            // Update the event data without changing the image
            $event->update($data);
        }

        return redirect('dashboard')->with('success', 'event Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Events $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'event deleted successfully!');
    }
}

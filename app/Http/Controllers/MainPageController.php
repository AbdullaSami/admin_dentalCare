<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\HistoryCards;
use App\Models\MainPage;
use App\Models\Events;
use App\Http\Requests\StoreMainPageRequest;
use App\Http\Requests\UpdateMainPageRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainPage = MainPage::all();
        $events = Events::all();
        $timeline = HistoryCards::all();
        $feedbacks = Feedback::where('is_published', true)->get();

        return view("dashboard", compact("mainPage","events","timeline","feedbacks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("offers.offer_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMainPageRequest $request)
    {
        // Validate the request data
    $data = $request->all();

    // Handle image upload (if applicable)
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $filename = time() . '_' . $image->getClientOriginalName();
        $relativePath = $image->storeAs('public/main-page_images', $filename);
        $data['img'] = URL::to(Storage::url($relativePath));

    }

    // Create the offer
    try {
        $offer = MainPage::create($data);
        return redirect()->route('main-page.index')->with('success', 'offer created successfully!');
    } catch (\Exception $e) {
        // Handle exceptions and provide informative error messages
        return redirect()->back()->withErrors(['error' => 'Failed to create offer: ' . $e->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(MainPage $mainPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MainPage $mainPage)
    {
        $offer = $mainPage;
        return view('offers.offer_edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMainPageRequest $request, $id)
    {

        // Get the offer data by id
        $offer = MainPage::findOrFail($id);

        // Validate the request data
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('img')) {
            $image = $request->file('img');

            // Generate a unique filename
            $filename = time() . '_' . $image->getClientOriginalName();

            // Upload the image to storage
            $relativePath = $image->storeAs('public/main-page_images', $filename);

            // Update the offer data
            $offer->update([
                ...$data,
                'img' => URL::to(Storage::url($relativePath)),
            ]);

            // Delete the old image if it exists
            if ($offer->img && $offer->img !== URL::to(Storage::url($relativePath))) {
                Storage::delete($offer->img);
            }
        } else {
            // Update the offer data without changing the image
            $offer->update($data);
        }

        return redirect('dashboard')->with('success', 'offer Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MainPage $mainPage)
    {
        $mainPage->delete();
        return redirect()->back()->with('success', 'Offer deleted successfully!');
    }
}

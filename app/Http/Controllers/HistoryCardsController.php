<?php

namespace App\Http\Controllers;

use App\Models\HistoryCards;
use App\Http\Requests\StoreHistoryCardsRequest;
use App\Http\Requests\UpdateHistoryCardsRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class HistoryCardsController extends Controller
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
        return view("timeline.timeline_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHistoryCardsRequest $request)
    {

        // Validate the request data
    $data = $request->all();

    // Handle image upload (if applicable)
    if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $filename = time() . '_' . $image->getClientOriginalName();
        $relativePath = $image->storeAs('public/cards_images', $filename);
        $data['logo'] = URL::to(Storage::url($relativePath));

    }

    // Create the card
    try {
        $card = HistoryCards::create($data);
        return redirect()->route('main-page.index')->with('success', 'card created successfully!');
    } catch (\Exception $e) {
        // Handle exceptions and provide informative error messages
        return redirect()->back()->withErrors(['error' => 'Failed to create card: ' . $e->getMessage()]);
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(HistoryCards $historyCards)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $timeline =  HistoryCards::findOrFail($id);
        return view("timeline.timeline_edit", compact('timeline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHistoryCardsRequest $request, $id)
    {
        // Get the card data by id
        $card = HistoryCards::findOrFail($id);

        // Validate the request data
        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');

            // Generate a unique filename
            $filename = time() . '_' . $image->getClientOriginalName();

            // Upload the image to storage
            $relativePath = $image->storeAs('public/cards_images', $filename);

            // Update the card data
            $card->update([
                ...$data,
                'logo' => URL::to(Storage::url($relativePath)),
            ]);

            // Delete the old image if it exists
            if ($card->logo && $card->logo !== URL::to(Storage::url($relativePath))) {
                Storage::delete($card->logo);
            }
        } else {
            // Update the card data without changing the image
            $card->update($data);
        }

        return redirect('dashboard')->with('success', 'card Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $historyCard= HistoryCards::findOrFail($id);
        $historyCard->delete();
        return redirect()->back()->with('success', 'Offer deleted successfully!');
    }
}

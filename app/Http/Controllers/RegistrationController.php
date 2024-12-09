<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;

class RegistrationController extends Controller
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
        $doctors = Registration::query()
        ->where('name','like', "%{$search}%")
        ->orderBy($sortField, $sortDirection)
        ->paginate($perPages);

        return view("registrations.registrations_table", compact("doctors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("registrations.registrations_create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistrationRequest $request)
    {
        $doctor = new Registration;
        $doctor->fill($request->all());
        $doctor->save();
        return redirect()->back()->with("success","");

    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $registration = Registration::findOrFail($id);
        return view("registrations.registrations_edit", compact("registration"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationRequest $request, $id)
    {
        $doctor = Registration::findOrFail($id);
        $doctor->fill($request->all());
        $doctor->save();
        return redirect()->route("registered-doctors.index")->with("success","");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}

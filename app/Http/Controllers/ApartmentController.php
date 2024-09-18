<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::where('user_id', Auth::user()->id)->get();
        return view('apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();

        return view('apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:230',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'rooms' => 'required|integer|min:1|max:255',
            'bathrooms' => 'required|integer|min:1|max:255',
            'beds' => 'required|integer|min:1|max:255',
            'square_meters' => 'required|integer|min:1',
            'address' => 'required|string|max:500',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'image' => 'required|string|max:2048',
            'is_visible' => 'boolean',
        ]);



        $apartment = new Apartment($request->all());
        $apartment->user_id = Auth::id();
        $apartment->save();

        if ($request->has('services')) {
            $apartment->services()->sync($request->services);
        }

        return redirect()->route('apartments.index')->with('success', 'Apartment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        return view('apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();

        return view('apartments.edit', compact('apartment', 'services'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apartment $apartment)
    {

        $request->validate([
            'title' => 'required|string|max:230',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'rooms' => 'required|integer|min:1|max:255',
            'bathrooms' => 'required|integer|min:1|max:255',
            'square_meters' => 'required|integer|min:1',
            'image' => 'nullable|string|max:2048',
            'is_visible' => 'boolean',
        ]);

        $apartment->update($request->only('title', 'description', 'rooms', 'bathrooms', 'square_meters', 'price', 'image', 'is_visible'));

        // Sincronizza i servizi selezionati (solo se presenti)
        if ($request->has('services')) {
            $apartment->services()->sync($request->services);
        } else {
            // Se nessun servizio è stato selezionato, rimuovi tutti i servizi associati
            $apartment->services()->detach();
        }

        return redirect()->route('apartments.show', $apartment->slug)->with('success', 'Apartment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return redirect()->route('apartments.index')->with('success', 'Apartment deleted successfully.');
    }
}

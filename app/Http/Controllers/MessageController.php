<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $apartment_slug)
    {
        $apartment = Apartment::where('slug', $apartment_slug)->first();
        if ($apartment == null) {
            abort(404, "Appartamento e messaggi non trovati nel nostro sistema. Prova a ripetere la ricerca o contatta il nostro team di supporto tecnico.");
        }
        $messages = Message::where("apartment_id", $apartment->id)->orderByDesc("created_at")->get();
        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|max:400',
            'content' => 'required|string|max:10000',
        ]);

        Message::create($request->all());
        return redirect()->route('messages.index')
            ->with('success', 'Message created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($apartment, Message $message)
    {
        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        $request->validate([
            'email' => 'required|string|max:400',
            'content' => 'required|string|max:10000',
        ]);

        $message->update($request->all());
        return redirect()->route('messages.index')
            ->with('success', 'Message updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $apartment_slug = $message->apartment->slug;
        $message->delete();
        return redirect()->route('messages.index', $apartment_slug)
            ->with('success', 'Message deleted successfully.');
    }
}

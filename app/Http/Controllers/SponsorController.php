<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\Apartments;
use App\Models\Apartment;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SponsorController extends Controller
{

    public function index()
    {
        $sponsorships = DB::table('apartments')
            ->join('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            ->join('sponsors', 'apartment_sponsor.sponsor_id', '=', 'sponsors.id')
            ->where('apartments.user_id', Auth::user()->id) // Filtra per l'utente loggato
            ->select('apartments.slug', 'sponsors.title as sponsor_title', 'sponsors.price', 'apartments.title as apartment_title', 'apartment_sponsor.start_time', 'apartment_sponsor.end_time')
            ->orderByDesc('apartment_sponsor.created_at')
            ->get();
        return view('sponsor.index', compact('sponsorships'));
    }

    public function create()
    {
        $sponsors = Sponsor::all();
        $apartments = Auth::user()->apartments;
        $persons_per_hour = 25;
        return view('sponsor.create', compact('sponsors', 'persons_per_hour', 'apartments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'apartment_id' => 'required|integer',
            'sponsor_id' => 'required|integer',
        ]);

        $sponsor_duration = Sponsor::where('id', $request->sponsor_id)->first()->duration;

        // prendo l'ultima sottoscrizione effettuate per l'appartamento indicato
        $last_subscription = DB::table('apartment_sponsor')
            ->where('apartment_id', $request->apartment_id)
            ->where('end_time', '>', Carbon::now())
            ->orderByDesc('end_time')
            ->first();

        // se non esiste un record o se è nel passato
        if ($last_subscription == null) {
            $end_time = now();
        } else {
            $end_time = $last_subscription->end_time;
        }


        $apartment = Apartment::where('id', $request->apartment_id)->with('sponsors')->first();

        $pivot_data = [
            'start_time' => $end_time,
            'end_time' => Carbon::parse($end_time)->addHours($sponsor_duration)
        ];

        $apartment->sponsors()->attach($request->sponsor_id, $pivot_data);
        return redirect()->route('sponsor.index')->with('message', 'La Sponsorizzazione del tuo appartamento è andata a buon fine');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Visit;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;


class StatisticController extends Controller
{
    public function index()
    {
        $apartments = Apartment::withCount(['visits', 'messages'])->where('user_id', Auth::user()->id)->get();
        return view('statistics.index', compact('apartments'));
    }

    public function show(Request $request, Apartment $apartment)
    {
        $months = [
            1 => 'Gennaio',
            2 => 'Febbraio',
            3 => 'Marzo',
            4 => 'Aprile',
            5 => 'Maggio',
            6 => 'Giugno',
            7 => 'Luglio',
            8 => 'Agosto',
            9 => 'Settembre',
            10 => 'Ottobre',
            11 => 'Novembre',
            12 => 'Dicembre'
        ];

        // Recupera gli anni disponibili
        $years = Visit::selectRaw('YEAR(created_at) as year')
            ->where('apartment_id', $apartment->id)
            ->distinct()
            ->orderBy('year', 'asc')
            ->pluck('year');

        // Raggruppa le visualizzazioni per mese e anno
        $visits = Visit::where('apartment_id', $apartment->id)
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Raggruppa i messaggi per mese e anno
        $messages = Message::where('apartment_id', $apartment->id)
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        return view('statistics.show', compact('apartment', 'visits', 'messages', 'months', 'years'));
    }
}

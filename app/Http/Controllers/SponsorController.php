<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        $apartments = Auth::user()->apartments;
        $persons_per_hour = 25;
        return view('sponsor.index', compact('sponsors', 'persons_per_hour', 'apartments'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        $persons_per_hour = 25;
        return view('sponsor.index', compact('sponsors', 'persons_per_hour'));
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class Apartments extends Controller
{


    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string',
            'range' => 'nullable|integer'
        ]);

        // Se la validazione fallisce
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Dati non validi, il search è obbligatorio e deve essere una stringa il range è opzionale ma deve essere un integer',
                'errors' => $validator->errors()
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }


        $response = Http::withUrlParameters([
            'endpoint' => 'https://api.tomtom.com/search/2/geocode',
            'query' => $request->search,
            'ext' => 'json',
            'myKey' => env('TOM_TOM_KEY'),
        ])->withoutVerifying()->get('{+endpoint}/{query}.{ext}?key={myKey}&limit=1');


        //posizione ricercata dall'utente
        $searched_position = json_decode($response->body())->results[0]->position;

        // Longitudine e latitudine dell'utente
        $userLatitude = $searched_position->lat;
        $userLongitude = $searched_position->lon;

        if ($request->range == null) {
            $radius = 20000; // Raggio in metri (20 km = 20000 metri)
        } else {
            $radius = $request->range * 1000;
        }

        // Query per ottenere gli appartamenti vicini
        $apartments = Apartment::selectRaw("
                id, title, image, price, user_id,
                ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) as distance
            ", [$userLongitude, $userLatitude])
            ->whereRaw(
                "ST_Distance_Sphere(point(longitude, latitude), point(?, ?)) < ?",
                [$userLongitude, $userLatitude, $radius]
            )
            ->orderBy('distance', 'asc')
            ->get();

        foreach ($apartments as $apartment) {
            $apartment->userName = User::where('id', $apartment->user_id)->first()->name;
        }
        // Restituisci il risultato come JSON
        return response()->json($apartments);
    }
}

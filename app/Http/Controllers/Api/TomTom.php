<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class TomTom extends Controller
{
    public function geolocalize($search)
    {

        $response = Http::withUrlParameters([
            'endpoint' => 'https://api.tomtom.com/search/2/geocode',
            'query' => $search,
            'ext' => 'json',
            'myKey' => env('TOM_TOM_KEY'),
        ])->withoutVerifying()->get('{+endpoint}/{query}.{ext}?key={myKey}');

        $data = json_decode($response->body());

        return json_encode([
            'result' => 'ok',
            'data' => $data->results[0],
        ]);
    }

    public function autocomplete($search)
    {

        $response = Http::withUrlParameters([
            'endpoint' => 'https://api.tomtom.com/search/2/search',
            'query' => $search,
            'ext' => 'json',
            'myKey' => env('TOM_TOM_KEY'),
        ])->withoutVerifying()->get('{+endpoint}/{query}.{ext}?key={myKey}&typehead=true&limit=5');

        $data = json_decode($response->body());

        return json_encode([
            'result' => 'ok',
            'data' => $data,
        ]);
    }
}

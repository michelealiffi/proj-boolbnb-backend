<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function get_services()
    {
        $services = Service::all();
        return request()->json([
            'status' => "ok",
            'services' => $services
        ]);
    }
}

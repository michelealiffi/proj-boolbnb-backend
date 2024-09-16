<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public function store_message(Request $request)
    {
        // riceve email e contenuto del messaggio da un utente + id_appartmento, se i dati sono corretti allora crea un messaggio
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'content' => 'required|string|max:2000',
            'apartment_id' => 'required|integer'
        ]);

        // Se la validazione fallisce
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bisogna fornire email, content e apartment_id',
                'errors' => $validator->errors()
            ], 422); // Codice HTTP 422 Unprocessable Entity
        }


        if (Apartment::where('id', $request->apartment_id)->exists()) {
            Message::create($request->all());
            return response()->json([
                'status' => 'ok'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => "L'id fornito non corrisponde ad alcun appartamento."
            ]);
        }
    }
}

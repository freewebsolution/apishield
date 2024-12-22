<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validazione dei dati in ingresso
        $request->validate([
            'codice_fiscale' => 'required|string',  // Solo il codice fiscale è richiesto
        ]);

        // Cerca l'utente per codice fiscale
        $user = User::where('codice_fiscale', $request->codice_fiscale)->first();

        // Verifica se l'utente esiste
        if (!$user) {
            return response()->json(['message' => 'Utente non trovato'], 404);
        }

        // Genera un token JWT per l'utente
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}


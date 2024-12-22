<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crea un utente con codice fiscale specifico
        User::create([
            'name' => 'Luciano Ticali',
            'email' => 'Lucio@example.com',
            'password' => Hash::make('password123'), // Usa una password sicura
            'codice_fiscale' => 'tcllcn85e29z112e'
        ]);
    }
}


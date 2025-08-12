<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // AGOLIGAN Ange

        User::create([
            'name' => 'AGOLIGAN Ange',
            'email' => 'agoliganange15@gmail.com',
            'password' => Hash::make('12345678'),
            'whatsapp_number' => '94849958',
            'isadmin' => true,
            'isactif' => true,
        ]);

        // FASSINOU NOel

        User::create([
            'name' => 'FASSINOU Noel',
            'email' => 'noelfassinou53@gmail.com',
            'password' => Hash::make('Fassinou53@'),
            'whatsapp_number' => '53947056',
            'isadmin' => true,
            'isactif' => true,
        ]);

        // KOUSSIEMEHOUN Arneaud

        User::create([
            'name' => 'KOUSSIEMEHOUN Arneaud',
            'email' => 'arneaudkoussiemehoun@gmail.com',
            'password' => Hash::make('Arno1234'),
            'whatsapp_number' => '52999984',
            'isadmin' => true,
            'isactif' => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        User::create([
            'name' => 'AGOLIGAN Ange',
            'email' => 'agoliganange15@gmail.com',
            'password' => Hash::make('12345678'),
            'whatsapp_number' => '94849958',
            'isadmin' => true,
            'isactif' => true,
        ]);
    }
}


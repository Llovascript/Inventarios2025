<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Llovanni',
            'lastname1' => 'Jimenez',
            'lastname2' => 'Bocanegra',
            'codigo' => '122043788',
            'email' => '122043788@upq.edu.mx',
            'password' => Hash::make('123456789'),
            'estatus' => 'activo',
            'id_role' => 1,
            'id_puesto' => 1,
            'email_verified_at' => now(),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Edificios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $edificios = [
            [
                'nombre' => 'Edificio A',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Edificio B',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Edificio C',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Edificio D',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('edificios')->insert($edificios); 
    }
}

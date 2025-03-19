<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Plantas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plantas = [
            [
                'nombre' => 'Alta',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Baja',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Unica',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('plantas')->insert($plantas); 
    }
}

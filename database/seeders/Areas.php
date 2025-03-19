<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Areas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            [
                'nombre' => 'Area prueba 1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Area prueba 2',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Area prueba 3',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('areas')->insert($areas); 
    }
}

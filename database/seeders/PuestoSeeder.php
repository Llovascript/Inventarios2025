<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puestos = [
            [
                'nombre' => 'PTC',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Directivo',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        
        DB::table('puestos')->insert($puestos);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nombre' => 'super admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'dictaminador',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'usuario',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('roles')->insert($roles); 
    }
}

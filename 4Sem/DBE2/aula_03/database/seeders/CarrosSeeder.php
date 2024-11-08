<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CarrosSeeder extends Seeder
{
    public function run()
    {
        DB::table('carros')->insert([
            [
                'modelo' => 'Fiesta',
                'marca' => 'Ford',
                'preco' => 50000,
                'ano' => 2020,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'modelo' => 'Civic',
                'marca' => 'Honda',
                'preco' => 60000,
                'ano' => 2021,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
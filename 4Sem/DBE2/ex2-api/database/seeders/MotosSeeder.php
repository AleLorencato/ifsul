<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotosSeeder extends Seeder
{
    public function run()
    {
        DB::table('motos')->insert([
            [
                'modelo' => 'Ninja',
                'marca' => 'Kawasaki',
                'preco' => 30000,
                'ano' => 2019,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'modelo' => 'CBR',
                'marca' => 'Honda',
                'preco' => 35000,
                'ano' => 2020,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
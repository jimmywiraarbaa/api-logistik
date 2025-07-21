<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            [
                'name' => "kg",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "liter",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => "pcs",
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

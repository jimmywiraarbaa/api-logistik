<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'Bintang Motor',
                'alamat' => 'jl.indarung',
                'no_hp' => '0812345678',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Berkat Kurnia',
                'alamat' => 'jl.lubeg',
                'no_hp' => '0812343453',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Toko 168',
                'alamat' => 'jl.pisang',
                'no_hp' => '081232343',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

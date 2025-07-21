<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'aku admin',
                'email' => 'logistik@gmail.com',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Asep',
                'email' => 'asep@gmail.com',
                'password' => Hash::make('asep123'),
                'role' => 'hrd',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ahmad',
                'email' => 'ahmad@gmail.com',
                'password' => Hash::make('ahmad123'),
                'role' => 'sales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supri',
                'email' => 'supri@gmail.com',
                'password' => Hash::make('supri123'),
                'role' => 'staff',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

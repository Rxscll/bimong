<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@library.com'],
            [
                'name' => 'Admin Library',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'nis' => null,
                'kelas' => null,
            ]
        );

        User::updateOrCreate(
            ['email' => 'marluth@library.com'],
            [
                'name' => 'Martin Luther King',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'nis' => null,
                'kelas' => null,
            ]
        );
    }
}
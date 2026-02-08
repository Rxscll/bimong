<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::updateOrCreate(
                ['email' => "student{$i}@school.com"],
                [
                    'name' => "Student {$i}",
                    'password' => Hash::make('password'),
                    'role' => 'siswa',
                    'nis' => str_pad($i, 5, '0', STR_PAD_LEFT),
                    'kelas' => 'XII-' . chr(65 + ($i - 1) % 3),
                ]
            );
        }

        User::updateOrCreate(
            ['email' => "rascald@school.com"],
            [
                'name' => "Rascal Donovan",
                'password' => Hash::make('rascal123'),
                'role' => 'siswa',
                'nis' => '2023001',
                'kelas' => 'RPL-2',
            ]
        );

    }
}
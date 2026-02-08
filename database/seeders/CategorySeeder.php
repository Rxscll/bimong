<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sains',
            'Matematika',
            'Sejarah',
            'Sastra',
            'Teknologi',
            'Seni',
            'Olahraga',
            'Agama'
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
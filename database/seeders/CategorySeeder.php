<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['nama_category' => 'Buket Bunga Segar'],
            ['nama_category' => 'Buket Bunga Kawat'],
            ['nama_category' => 'Buket Bunga Rajut'],
            ['nama_category' => 'Buket Bunga Sabun'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

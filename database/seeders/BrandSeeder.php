<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['nama_brand' => 'YourFav Original'],
            ['nama_brand' => 'FloraLux'],
            ['nama_brand' => 'Bloom Garden'],
            ['nama_brand' => 'PetalCraft'],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}

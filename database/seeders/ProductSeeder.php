<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama_product' => 'Buket Romantis Pink',
                'deskripsi'    => 'Rangkaian bunga premium warna pink, cocok untuk hadiah romantis.',
                'harga'        => 350000,
                'stok'         => 15,
                'gambar'       => 'Buket Romantis Pink.jpg',
                'category_id'  => 1,
                'brand_id'     => 1,
            ],
            [
                'nama_product' => 'Buket Elegan Ungu',
                'deskripsi'    => 'Bunga ungu mewah dengan sentuhan putih, tampil elegan.',
                'harga'        => 425000,
                'stok'         => 12,
                'gambar'       => 'Buket Elegan Ungu.jpg',
                'category_id'  => 1,
                'brand_id'     => 2,
            ],
            [
                'nama_product' => 'Buket Passion Merah',
                'deskripsi'    => 'Bunga merah segar untuk momen spesial.',
                'harga'        => 400000,
                'stok'         => 18,
                'gambar'       => 'Buket Passion Merah.jpg',
                'category_id'  => 2,
                'brand_id'     => 1,
            ],
            [
                'nama_product' => 'Buket Kawat Pelangi',
                'deskripsi'    => 'Buket bunga kawat bulu warna-warni, tahan lama dan cantik.',
                'harga'        => 275000,
                'stok'         => 20,
                'gambar'       => null,
                'category_id'  => 2,
                'brand_id'     => 3,
            ],
            [
                'nama_product' => 'Buket Rajut Sunflower',
                'deskripsi'    => 'Buket bunga matahari rajut handmade, awet selamanya.',
                'harga'        => 300000,
                'stok'         => 10,
                'gambar'       => null,
                'category_id'  => 3,
                'brand_id'     => 4,
            ],
            [
                'nama_product' => 'Buket Sabun Rose Gold',
                'deskripsi'    => 'Buket bunga sabun warna rose gold, wangi dan elegan.',
                'harga'        => 200000,
                'stok'         => 25,
                'gambar'       => null,
                'category_id'  => 4,
                'brand_id'     => 2,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

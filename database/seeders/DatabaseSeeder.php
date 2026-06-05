<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin YourFav',
            'email' => 'admin@yourfavflorist.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Regular User
        User::create([
            'name' => 'Septia',
            'email' => 'septia@yourfavflorist.com',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);

        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
        ]);
    }
}

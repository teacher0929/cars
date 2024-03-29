<?php

namespace Database\Seeders;

use App\Models\BrandModel;
use App\Models\Car;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->count(10)
            ->create();

        $this->call([
            LocationSeeder::class,
            BrandModelSeeder::class,
            ColorSeeder::class,
            YearSeeder::class,
        ]);

        Car::factory()
            ->count(1000)
            ->create();
    }
}

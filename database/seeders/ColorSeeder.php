<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            'White',
            'Black',
            'Red',
            'Green',
            'Blue',
            'Yellow',
            'Gray',
        ];

        foreach ($objs as $obj) {
            Color::create([
                'name' => $obj,
            ]);
        }
    }
}

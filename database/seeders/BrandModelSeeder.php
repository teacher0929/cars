<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\BrandModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            ['name' => 'Toyota', 'models' => [
                'Avalon', 'Camry', 'Corolla', 'Highlander', 'Hilux',
            ]],
            ['name' => 'Lexus', 'models' => [
                'ES 350', 'RX 350',
            ]],
            ['name' => 'BMW', 'models' => [
                'M5', 'X5', 'X6', 'X7',
            ]],
            ['name' => 'Mercedes-Benz', 'models' => [
                'S-Class', 'CLS', 'E-Class', 'M-Class',
            ]],
            ['name' => 'Hyundai', 'models' => [
                'Elantra', 'Santa Fe', 'Sonata', 'Tuscon',
            ]],
        ];

        foreach ($objs as $obj) {
            $brand = Brand::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $model) {
                BrandModel::create([
                    'brand_id' => $brand->id,
                    'name' => $model,
                ]);
            }
        }
    }
}

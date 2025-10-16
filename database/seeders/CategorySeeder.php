<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categories = [
            ['name' => 'Category 1', 'icon' => 'icon1'],
            ['name' => 'Category 2', 'icon' => 'icon2'],
            ['name' => 'Category 3', 'icon' => 'icon3'],
            ['name' => 'Category 4', 'icon' => 'icon4'],
            ['name' => 'Category 5', 'icon' => 'icon5'],
            ['name' => 'Category 6', 'icon' => 'icon6'],

        ];

        foreach ($categories as $key => $category) {
            Category::updateOrCreate(
                ['id' => $key + 1],
                [
                    'name' => $category['name'],
                    'icon' => $category['icon'],
                    // 'order' => $key + 1,
                    'tenant_id' => 1
                ]
            );
        }
    }
}

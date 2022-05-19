<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Fashion & Accessories',
                'slug' => 'fashion-accessories'
            ],
            [
                'name' => 'Furniture & Home Decors',
                'slug' => 'furniture-homedecors'
            ],
            [
                'name' => 'Digital & Electronics',
                'slug' => 'digital-electronics'
            ],
            [
                'name' => 'Tools & Equipments',
                'slug' => 'tools-equipments'
            ],
            [
                'name' => 'Kid\'s Toys',
                'slug' => 'kids-toys'
            ],
            [
                'name' => 'Organics & Spa',
                'slug' => 'organics-spa'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

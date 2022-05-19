<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i=1; $i < 9; $i++) { 
                    
            $product_name = $faker->unique()->words($nb = 4, $asText = true);
            $slug = Str::slug($product_name);

            Product::create([
                'name' => $product_name,
                'slug' => $slug,
                'short_description' => $faker->text(200),
                'description' => $faker->text(500),
                'price' => $faker->numberBetween(10, 500),
                'SKU' => 'ORGANIC'. $faker->unique()->numberBetween(100, 500),
                'stock_status' => 'instock',
                'quantity' => $faker->numberBetween(100, 200),
                'image' => 'organics_spa_'. $i . '.jpg',
                'category_id' => 6
            ]);
        }
    }
}

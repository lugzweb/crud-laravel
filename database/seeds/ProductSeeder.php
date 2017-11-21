<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = 1;
        $max = 1000;
        $faker = \Faker\Factory::create();
        for ($j = 0; $j < 1000; $j++) {
            $products = [];
            for ($i = 0; $i < 10000; $i++) {
                $products[] = [
                    'title' => $faker->company,
                    'price' => mt_rand($min * 10, $max * 10) / 10,
                    'crated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ];
            }
            Product::insert($products);
        }

    }
}
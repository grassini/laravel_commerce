<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;


class ProductsTableSeeder  extends Seeder
{
    public function run()
    {
        DB::table('products')->truncate();

        $faker = Faker::create('pt_BR');

        foreach (range(1, 40) as $i) {

            Product::create([
                'name'          => $faker->Word(),
                'description'   => $faker->text(),
                'price'         => $faker->randomNumber(2).',00',
                'category_id'   => $faker->numberBetween(1,15),
                'featured'      => $faker->boolean(),
                'recommend'     => $faker->boolean()
            ]);

        }

    }
}
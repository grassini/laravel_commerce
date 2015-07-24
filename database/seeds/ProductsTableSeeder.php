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

        factory('CodeCommerce\Product', 30)->create();


    }
}
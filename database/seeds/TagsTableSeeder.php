<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;
use Faker\Factory as Faker;

class TagsTableSeeder  extends Seeder
{
    public function run()
    {

        DB::table('tags')->truncate();

        factory('CodeCommerce\Tag', 15)->create();
        

    }
}
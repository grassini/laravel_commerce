<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Tag;
use Faker\Factory as Faker;

class TagsTableSeeder  extends Seeder
{
    public function run()
    {
        //DB::statement("SET foreign_key_checks = 0");
        DB::table('tags')->truncate();


        $faker = Faker::create('pt_BR');

        foreach (range(1, 15) as $i) {

            Tag::create([
                'name' => $faker->firstName,
            ]);

        }

    }
}
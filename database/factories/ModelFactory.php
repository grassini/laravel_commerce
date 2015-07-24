<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define('CodeCommerce\User', function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define('CodeCommerce\Category', function ($faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});

$factory->define('CodeCommerce\Product', function ($faker) {
    return [
        'name'          => $faker->Word(),
        'description'   => $faker->text(),
        'price'         => $faker->randomNumber(3),
        'category_id'   => $faker->numberBetween(1,15),
        'featured'      => $faker->boolean(),
        'recommend'     => $faker->boolean()
    ];
});

$factory->define('CodeCommerce\Tag', function ($faker) {
    return [
        'name' => $faker->firstName,
    ];
});
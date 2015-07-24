<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder  extends Seeder
{
    public function run()
    {

        DB::table('users')->truncate();


        factory('CodeCommerce\User')->create(
            [
                'name'      => 'Jefferson',
                'email'     => 'grassini@ig.com.br',
                'password'  => Hash::make(123456)
            ]
        );


        factory('CodeCommerce\User', 10)->create();

    }
}
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        /*Usando para dar o truncate no MY_SQl*/
        DB::statement("SET foreign_key_checks = 0");


		$this->call('UserTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('ProductsTableSeeder');
		$this->call('TagsTableSeeder');

	}

}

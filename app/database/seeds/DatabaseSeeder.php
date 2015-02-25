<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

    public function run()
    {
		User::create(array(
		  'username' => 'philipbrown',
		  'email' => 'kopahead@gmail.com',
		  'password' => '1234'
		));

		$this->command->info('User table seeded!');
    }



}

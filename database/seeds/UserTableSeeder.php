<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	for ($i=0; $i < 671 ; $i++) { 
    		DB::table('users')->insert([
    			'email' => $faker->email,
    			'name' => $faker->name,
    			'password' => password_hash('12345678', PASSWORD_BCRYPT)
    		]);
    	}
    }
}

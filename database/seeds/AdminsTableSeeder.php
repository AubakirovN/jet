<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert(array(
        	array(
			 'name' => "Admin",
			 'email' => 'admin@gmail.com',
			 'password' => bcrypt('qwerty123'),
			        	),
			        	array(
			 'name' => "Admin01",
			 'email' => 'admin01@gmail.com',
			 'password' => bcrypt('qwerty123'),
			        	)
        ));
    }
}

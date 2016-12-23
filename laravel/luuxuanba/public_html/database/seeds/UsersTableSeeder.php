<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 10;$i++)
        {
        	DB::table('users')->insert(
	        	[
	        		'name' => 'luuxuanba'.$i,
	            	'email' => 'ba'.$i.'@gmail.com',
	            	'password' => bcrypt('123456'),
	            	'quyen'=> 0,
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }
}

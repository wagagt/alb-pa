<?php

use DB;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')->insert(array(
				'name'      => 'Wiler Gonzalez',
				'usuario'   => 'wagagt',
				'email'     => 'wagagt@gmail.com',
				'pasaporte' => '2757 70419 0101',
				'cedula'    => 'a-1 881712',
				'password'  => \Hash::make('wagapass'),
				'tipo'      => 'admin',
				'status'    => 1,
			));
		DB::table('users')->insert(array(
				'name'      => 'Axel Sarceño',
				'usuario'   => 'axelsarce',
				'email'     => 'axel.sarceno@hosannaweb.com',
				'pasaporte' => '2546 09139 0101',
				'cedula'    => 'a-1 1024861',
				'password'  => \Hash::make('123456'),
				'tipo'      => 'admin',
				'status'    => 1,
			));

		DB::table('users')->insert(array(
				'name'      => 'Axel Ramirez',
				'usuario'   => 'aramirez',
				'email'     => 'aramirez@albpanama.com',
				'pasaporte' => '2546 09139 0405',
				'cedula'    => 'a-1 1024861',
				'password'  => \Hash::make('123456'),
				'tipo'      => 'admin',
				'status'    => 1,
			));
	}
}

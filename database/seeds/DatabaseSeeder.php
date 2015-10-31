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

		$this->call('RolesTableSeeder');
		$this->command->info('Roles table seeded!');
		
		$this->call('ClientesTableSeeder');
		$this->command->info('Clientes table seeded!');
		
		$this->call('UsersTableSeeder');
		$this->command->info('User table seeded!');
		
		$this->call('EstadosTableSeeder');
		$this->command->info('User estados seeded!');
		
		$this->call('ProyectosTableSeeder');
		$this->command->info('Proyectos table seeded!');
		
		$this->call('ComentariosTableSeeder');
		$this->command->info('Comentarios table seeded!');
		
	}

}

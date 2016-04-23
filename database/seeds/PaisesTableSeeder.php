<?php

use Illuminate\Database\Seeder;

class PaisesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$paises = [
			['pais' => 'Panamá', 'ciudad' => 'Panamá'],
			['pais' => 'México', 'ciudad' => 'México DF'],
			['pais' => 'Colombia', 'ciudad' => 'Bogotá'],
			['pais' => 'Perú', 'ciudad' => 'Lima'],
		];

		foreach ($paises as $pais) {
			App\Paise::create($pais);
		}
	}
}

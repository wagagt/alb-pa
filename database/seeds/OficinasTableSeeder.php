<?php

use Illuminate\Database\Seeder;

class OficinasTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$oficinas = [
			['nombre' => 'Oficina Panameña ALB', 'telefono' => ' 65921354', 'direccion' => '21calle Edif. Vivaldi Of. 12-01', 'pais_id' => 1],
		];

		foreach ($oficinas as $oficina) {
			App\Oficina::create($oficina);
		}
	}
}

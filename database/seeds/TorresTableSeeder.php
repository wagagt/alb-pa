<?php

use Illuminate\Database\Seeder;

class TorresTableSeeder extends Seeder {
	public function run() {
		//
		$torres = [
			['nombre' => 'SEAWAVES', 'direccion' => 'Calle 52 Ciudad de Panamá', 'niveles' => '45', 'oficina_id' => '1']
		];

		foreach ($torres as $torre) {
			App\Torre::create($torre);
		};
	}
}

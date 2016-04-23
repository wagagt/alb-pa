<?php

use Illuminate\Database\Seeder;

class TorresTableSeeder extends Seeder {
	public function run() {
		//
		$torres = [
			['nombre' => 'Torre Aparicio', 'direccion' => 'zona 13', 'niveles' => '4', 'oficina_id' => '1'],

		];

		foreach ($torres as $torre) {
			App\Torre::create($torre);
		};
	}
}

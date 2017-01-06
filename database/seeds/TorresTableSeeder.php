<?php

use Illuminate\Database\Seeder;

class TorresTableSeeder extends Seeder {
	public function run() {
		//
		$torres = [
			['nombre' => 'SEAWAVES', 'direccion' => 'Calle 52 Ciudad de Panamá', 'niveles' => '45', 'oficina_id' => '1'],
            ['nombre' => 'QUINTAS DE VERSALLES', 'direccion' => 'Domingo Diaz ', 'niveles' => '146', 'torre_numero' => '04', 'oficina_id' => '1'],
            ['nombre' => 'P.H OASIS TOWER', 'direccion' => 'Via porras', 'niveles' => '37', 'torre_numero' => '06', 'oficina_id' => '1'],
            ['nombre' => 'P.H. WINDOW TOWER', 'direccion' => 'CALLE 66 SAN FRANCISCO', 'niveles' => '33', 'torre_numero' => '08', 'oficina_id' => '1'],
            ['nombre' => 'P.H. SOPHIA TOWER ', 'direccion' => 'CALLE 54 OBARRIO', 'niveles' => '28', 'torre_numero' => '09', 'oficina_id' => '1'],
            ['nombre' => 'P.H. RIVERSIDE', 'direccion' => 'Costa del Este', 'niveles' => '41', 'torre_numero' => '05', 'oficina_id' => '1']


		];

		foreach ($torres as $torre) {
			App\Torre::create($torre);
		};
	}
}

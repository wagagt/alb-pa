<?php

use Illuminate\Database\Seeder;

class ApartamentoTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$apartamentos = [
			['numero'           => '01-A',
				'nivel'            => 'N01',
				'cantidad_banios'  => '3',
				'metros_cuadrados' => '600',
				'ambientes'        => '4',
				'dormitorios'      => '3',
				'torre_id'         => '1',
				'user_id'          => '3'],

			['numero'           => '01-B',
				'nivel'            => 'N01',
				'cantidad_banios'  => '4',
				'metros_cuadrados' => '400',
				'ambientes'        => '5',
				'dormitorios'      => '4',
				'torre_id'         => '1',
				'user_id'          => '4'],
		];

		foreach ($apartamentos as $apartamento) {
			App\Apartamento::create($apartamento);
		}
	}
}

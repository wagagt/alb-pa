<?php

use Illuminate\Database\Seeder;

class TipoDocumentosTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$tiposdocumentos = [
			['descripcion' => 'Cuentas por cobrar'],
			['descripcion' => 'Conciliación bancaria'],
			['descripcion' => 'Balance general'],
			['descripcion' => 'Cuentas por Pagar'],
			['descripcion' => 'Estado de resultados'],
			['descripcion' => 'Boletines'],
			['descripcion' => 'Proyectos de mejoras']
		];

		foreach ($tiposdocumentos as $tipodoc) {
			App\Tipo_documento::create($tipodoc);
		}
	}
}

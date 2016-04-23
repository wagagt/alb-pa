<?php

use Illuminate\Database\Seeder;

class DocumentosTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		//
		$documentos = [
			['nombre' => 'Estado Financiero 1-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-01-01', 'fecha_al' => '2016-01-30', 'torre_id' => 1],
			['nombre' => 'Estado Financiero 2-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-02-01', 'fecha_al' => '2016-02-28', 'torre_id' => 1],
		];

		foreach ($documentos as $doc) {
			App\Documento::create($doc);
		}
	}
}

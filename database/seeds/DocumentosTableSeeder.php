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
			['nombre' => 'Estado Financiero 3-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-03-01', 'fecha_al' => '2016-03-30', 'torre_id' => 1],

			['nombre' => 'Estado Financiero 4-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-04-01', 'fecha_al' => '2016-04-28', 'torre_id' => 1],
			['nombre' => 'Estado Financiero 5-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-05-01', 'fecha_al' => '2016-05-28', 'torre_id' => 1],
			['nombre' => 'Estado Financiero 6-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-06-01', 'fecha_al' => '2016-06-28', 'torre_id' => 1],

			['nombre' => 'Estado Financiero 7-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-07-01', 'fecha_al' => '2016-07-28', 'torre_id' => 1],
			// ['nombre' => 'Estado Financiero 8-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-08-01', 'fecha_al' => '2016-08-28', 'torre_id' => 1],
			// ['nombre' => 'Estado Financiero 9-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-09-01', 'fecha_al' => '2016-09-28', 'torre_id' => 1],

			// ['nombre' => 'Estado Financiero 10-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-10-01', 'fecha_al' => '2016-10-28', 'torre_id' => 1],
			// ['nombre' => 'Estado Financiero 11-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-11-01', 'fecha_al' => '2016-11-28', 'torre_id' => 1],
			// ['nombre' => 'Estado Financiero 12-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-12-01', 'fecha_al' => '2016-12-28', 'torre_id' => 1],

			['nombre' => 'Cuentas x pagar 1-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-01-01', 'fecha_al' => '2016-01-30', 'torre_id' => 1],
			['nombre' => 'Cuentas x pagar 2-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-02-01', 'fecha_al' => '2016-02-28', 'torre_id' => 1],
			['nombre' => 'Cuentas x pagar 3-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-03-01', 'fecha_al' => '2016-03-30', 'torre_id' => 1],

			['nombre' => 'Cuentas x pagar 4-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-04-01', 'fecha_al' => '2016-04-28', 'torre_id' => 1],
			['nombre' => 'Cuentas x pagar 5-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-05-01', 'fecha_al' => '2016-05-28', 'torre_id' => 1],
			['nombre' => 'Cuentas x pagar 6-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-06-01', 'fecha_al' => '2016-06-28', 'torre_id' => 1],

			['nombre' => 'Cuentas x pagar 7-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-07-01', 'fecha_al' => '2016-07-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x pagar 8-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-08-01', 'fecha_al' => '2016-08-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x pagar 9-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-09-01', 'fecha_al' => '2016-09-28', 'torre_id' => 1],

			// ['nombre' => 'Cuentas x pagar 10-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-10-01', 'fecha_al' => '2016-10-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x pagar 11-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-11-01', 'fecha_al' => '2016-11-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x pagar 12-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-12-01', 'fecha_al' => '2016-12-28', 'torre_id' => 1],


			['nombre' => 'Cuentas x cobrar 1-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-01-01', 'fecha_al' => '2016-01-30', 'torre_id' => 1],
			['nombre' => 'Cuentas x cobrar 2-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-02-01', 'fecha_al' => '2016-02-28', 'torre_id' => 1],
			['nombre' => 'Cuentas x cobrar 3-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-03-01', 'fecha_al' => '2016-03-30', 'torre_id' => 1],

			['nombre' => 'Cuentas x cobrar 4-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-04-01', 'fecha_al' => '2016-04-28', 'torre_id' => 1],
			['nombre' => 'Cuentas x cobrar 5-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-05-01', 'fecha_al' => '2016-05-28', 'torre_id' => 1],
			['nombre' => 'Cuentas x cobrar 6-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-06-01', 'fecha_al' => '2016-06-28', 'torre_id' => 1],

			['nombre' => 'Cuentas x cobrar 7-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-07-01', 'fecha_al' => '2016-07-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x cobrar 8-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-08-01', 'fecha_al' => '2016-08-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x cobrar 9-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-09-01', 'fecha_al' => '2016-09-28', 'torre_id' => 1],

			// ['nombre' => 'Cuentas x cobrar 10-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-10-01', 'fecha_al' => '2016-10-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x cobrar 11-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-11-01', 'fecha_al' => '2016-11-28', 'torre_id' => 1],
			// ['nombre' => 'Cuentas x cobrar 12-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-12-01', 'fecha_al' => '2016-12-28', 'torre_id' => 1],

			['nombre' => 'Bancos 1-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-01-01', 'fecha_al' => '2016-01-30', 'torre_id' => 1],
			['nombre' => 'Bancos 2-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-02-01', 'fecha_al' => '2016-02-28', 'torre_id' => 1],
			['nombre' => 'Bancos 3-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-03-01', 'fecha_al' => '2016-03-30', 'torre_id' => 1],

			['nombre' => 'Bancos 4-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-04-01', 'fecha_al' => '2016-04-28', 'torre_id' => 1],
			['nombre' => 'Bancos 5-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-05-01', 'fecha_al' => '2016-05-28', 'torre_id' => 1],
			['nombre' => 'Bancos 6-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-06-01', 'fecha_al' => '2016-06-28', 'torre_id' => 1],

			['nombre' => 'Bancos 7-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-07-01', 'fecha_al' => '2016-07-28', 'torre_id' => 1]
			// ['nombre' => 'Bancos 8-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-08-01', 'fecha_al' => '2016-08-28', 'torre_id' => 1],
			// ['nombre' => 'Bancos 9-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-09-01', 'fecha_al' => '2016-09-28', 'torre_id' => 1],

			// ['nombre' => 'Bancos 10-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-10-01', 'fecha_al' => '2016-10-28', 'torre_id' => 1],
			// ['nombre' => 'Bancos 11-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '2016-11-01', 'fecha_al' => '2016-11-28', 'torre_id' => 1],
			// ['nombre' => 'Bancos 12-2016', 'tipo_documentos_id' => 5, 'fecha_del' => '2016-12-01', 'fecha_al' => '2016-12-28', 'torre_id' => 1]

		];

		foreach ($documentos as $doc) {
			App\Documento::create($doc);
		}
	}
}

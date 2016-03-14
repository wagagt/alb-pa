<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class TipoDocumentosTableSeeder.php extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tiposdocumentos=[
		['descripcion' => 'Estado de Cuenta'],
		['descripcion' => 'Estado Financiero'],
		['descripcion' => 'Bancos'],
		['descripcion' => 'Cuentas por Pagar'],
		['descripcion' => 'Estado de Cobrar']
        ];

        foreach($tiposdocumentos as $tipodoc){
        	App\Tipo_documento::create($tipodoc);
        }
    }
}
 	
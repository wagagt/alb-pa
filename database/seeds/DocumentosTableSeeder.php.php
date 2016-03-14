<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DocumentosTableSeeder.php extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$documentos = [
    	['nombre' => 'Estado Financiero 1-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '01/01/2016', 'fecha_al' => '01/30/2016', 'user_id' => 1],
    	['nombre' => 'Estado Financiero 2-2016', 'tipo_documentos_id' => 1, 'fecha_del' => '02/01/2016', 'fecha_al' => '02/30/2016', 'user_id' => 1]
    	];

    	foreach($documentos as $doc){
    		App\Documentos::create($doc);
    	}
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArchivoDocumentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $archivo_docs =[
          [
          'nombre' => 'Estado Financiero',
          'tipo'   => '2',
          'activo' => '1',
          'documentos_id' => '1'
        ]
      ];
      foreach($archivo_docs as $archivo_doc){
        App\Archivos_documento::create($archivo_doc);
      }
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StatusComentsSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $status_comentarios = [
      ['tipo'           => 'Enviado' ],
      ['tipo'           => 'Recibido' ],
      ['tipo'           => 'Eliminado']
    ];
    foreach($status_comentarios as $status_comentario){
      App\Models\status_coments::create($status_comentario);
    }
  }
}

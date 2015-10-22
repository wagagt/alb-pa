<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EstadosTableSeeder extends Seeder {
public function run()
 {
    $estados = [
     ['descripcion' => 'Ingresado'],
     ['descripcion' => 'Trabajando'],
     ['descripcion' => 'Suspendido'],
     ['descripcion' => 'Terminado']
     ];
    DB::table('estados')->insert($estados);
 }
 
}

<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientesTableSeeder extends Seeder {
public function run()
 {
    $cliente = [
     ['nombre' => 'Default', 'contacto_nombres' => 'nombres', 'contacto_apellidos'=>'apellidos',
     'telefono' => '12345678', 'direccion' => "direccion" , 'email' => 'email@demo.com',
     'created_at' => new DateTime],
     ];
    DB::table('clientes')->insert($cliente);
 }
 
}

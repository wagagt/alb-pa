<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ClientesTableSeeder extends Seeder {
public function run()
 {
    $cliente = [
     ['nombre' => 'ADMINISTRADOR', 'contacto_nombres' => 'admin name', 'contacto_apellidos'=>'admin lastname',
     'telefono' => '12345678', 'direccion' => "direccion" , 'email' => 'admin@demo.com',
     'created_at' => new DateTime],
     ['nombre' => 'Cliente Uno', 'contacto_nombres' => 'nombres c1', 'contacto_apellidos'=>'apellidos c1',
     'telefono' => '12345678', 'direccion' => "direccion" , 'email' => 'email1@demo.com',
     'created_at' => new DateTime],
     ['nombre' => 'Cliente Dos', 'contacto_nombres' => 'nombres c2', 'contacto_apellidos'=>'apellidos c2',
     'telefono' => '12345678', 'direccion' => "direccion" , 'email' => 'email2@demo.com',
     'created_at' => new DateTime],
     ['nombre' => 'Cliente TRES', 'contacto_nombres' => 'nombres c3', 'contacto_apellidos'=>'apellidos c3',
     'telefono' => '12345678', 'direccion' => "direccion" , 'email' => 'email2@demo.com',
     'created_at' => new DateTime]
     ];
    DB::table('clientes')->insert($cliente);
 }
 
}

<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder {
public function run()
 {
    $rol = [
     ['descripcion' => 'Admin', 'created_at' => new DateTime],
     ['descripcion' => 'Usuario', 'created_at' => new DateTime]
     ];
    DB::table('roles')->insert($rol);
 }
 
}

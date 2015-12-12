<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder {
public function run()
 {
    $rol = [
     ['descripcion' => 'Admin', 'created_at' => new DateTime],  // 1 = Admin
     ['descripcion' => 'Usuario', 'created_at' => new DateTime] // 2 = Usuario
     ];
    DB::table('roles')->insert($rol);
 }
 
}

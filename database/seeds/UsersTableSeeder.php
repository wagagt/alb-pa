<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder {
public function run()
 {
    $user = [
     ['name' => 'wagagt', 'contact_fname' => 'Wilver', 'contact_lname' => 'Gonzalez', 
      'email' => 'wagagt@gmail.com', 'password' => Hash::make("waga15"), 
      'id_rol'=>'1', 'id_cliente'=>'1', 'created_at' => new DateTime]
     ];
    DB::table('users')->insert($user);
 }
 
}

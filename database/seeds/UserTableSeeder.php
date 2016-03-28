<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          \DB::table('users')->insert(array (
            'name'=>'Wiler Gonzalez', 
            'usuario' => 'wagagt', 
            'email' => 'wagagt@gmail.com', 
            'pasaporte' => '2757 70419 0101', 
            'cedula' => 'a-1 881712', 
            'password' => \Hash::make('wagapass'), 
            'tipo' => 'admin', 
            'status' => 1 
            ));
          
          factory(App\User::class, 5)->create();
    }
}

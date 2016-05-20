<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Flynsarmy\CsvSeeder\CsvSeeder;

class UserTableSeeder extends CsvSeeder
{
   
    public function __construct()
    {
        $this->table = 'users';
        $this->csv_delimiter = '|';
        $this->filename = base_path().'/database/seeds/csvs/exp-propietarios.csv';
    }

    public function run()
    {

      parent::run();
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
            \DB::table('users')->insert(array (
            	'name'=>'Axel Sarceño',
            	'usuario' => 'axelsarce',
            	'email' => 'axel.sarceno@hosannaweb.com',
            	'pasaporte' => '2546 09139 0101',
            	'cedula' => 'a-1 1024861',
            	'password' => \Hash::make('123456'),
            	'tipo' => 'admin', 
            	'status' => 1
            	));
    }
}

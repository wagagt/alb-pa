<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TorresTableSeeder extends Seeder
{
    public function run()
    {
        //
        $torres = [
            ['nombre'=> 'SEAWAVES', 'direccion'=>'Calle 52 Ciudad de Panamá', 'niveles'=>'45','oficina_id' => '1'],
            ['nombre'=> 'La Pradera', 'direccion'=>'Zona 10', 'niveles'=>'6','oficina_id' => '2'],
            ['nombre'=> 'Euro Plaza', 'direccion'=>'Zona 14', 'niveles'=>'8','oficina_id' => '3'],
            ['nombre'=> 'Geminis 10', 'direccion'=>'Zona 15', 'niveles'=>'10','oficina_id' => '1'],
            ['nombre'=> 'Metro Norte', 'direccion'=>'Zona 18', 'niveles'=>'12','oficina_id' => '2'],
            ['nombre'=> 'Novicentro', 'direccion'=>'Zona 5', 'niveles'=>'14','oficina_id' => '1']
            ];

            foreach($torres as $torre){
                App\Torre::create($torre);
            };
    }
}

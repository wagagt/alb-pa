<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ApartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $apartamentos = [
        ['numero'   => '01-A',
        'nivel' => 'N01',
        'cantidad_banios'   => '3',
        'metros_cuadrados'  => '600',
        'ambientes' => '4',
        'dormitorios'   => '3',
        'marca_v_1' => 'BMW',
        'modelo_v_1'    => '2014',
        'placa_v_1' => 'A654656',
        'marca_v_2' => '',
        'modelo_v_2'    => '',
        'placa_v_2' => '',
        'torre_id'  => '1',
        'user_id'=> '1'],

        ['numero'   => '01-B',
        'nivel' => 'N01',
        'cantidad_banios'   => '4',
        'metros_cuadrados'  => '400',
        'ambientes' => '5',
        'dormitorios'   => '4',
        'marca_v_1' => 'MAZDA',
        'modelo_v_1'    => '2014',
        'placa_v_1' => 'A654656',
        'marca_v_2' => '',
        'modelo_v_2'    => '',
        'placa_v_2' => '',
        'torre_id'  => '2',
        'user_id'=> '2'],

        ['numero'   => '10-A',
        'nivel' => 'N10',
        'cantidad_banios'   => '3',
        'metros_cuadrados'  => '600',
        'ambientes' => '4',
        'dormitorios'   => '3',
        'marca_v_1' => 'BMW',
        'modelo_v_1'    => '2014',
        'placa_v_1' => 'A654656',
        'marca_v_2' => '',
        'modelo_v_2'    => '',
        'placa_v_2' => '',
        'torre_id'  => '2',
        'user_id'=> '4'],

        ['numero'   => '11-B',
        'nivel' => 'N11',
        'cantidad_banios'   => '4',
        'metros_cuadrados'  => '400',
        'ambientes' => '5',
        'dormitorios'   => '4',
        'marca_v_1' => 'MAZDA',
        'modelo_v_1'    => '2014',
        'placa_v_1' => 'A654656',
        'marca_v_2' => '',
        'modelo_v_2'    => '',
        'placa_v_2' => '',
        'torre_id'  => '1',
        'user_id'=> '4']
        ];

        foreach($apartamentos as $apartamento){
        	App\Apartamento::create($apartamento);
        }
    }
}

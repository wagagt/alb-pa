<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $paises = [
        	['pais' => 'Panamá', 'ciudad' => 'Panamá'],
        	['pais' => 'Guatemala', 'ciudad' => 'Guatemala'],
        	['pais' => 'Chile', 'ciudad' => 'Valparaiso'],
        ];

        foreach ($paises as $pais){
        	App\Paise::create($pais);
        }
    }
}

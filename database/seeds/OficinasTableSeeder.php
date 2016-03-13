<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OficinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $oficinas = [
        ['nombre' => 'Oficina Panameña ALB', 'telefono' => ' 65921354', 'direccion' => '21calle Edif. Vivaldi Of. 12-01', 'pais_id' => 1],
        ['nombre' => 'Oficina Panameña No.2 ALB', 'telefono' => '65465488', 'direccion' => '12av Edif. Reforma Of. 12-01', 'pais_id' => 1],
        ['nombre' => 'Oficina Chile', 'telefono' => ' 98798755', 'direccion' => '12c. 12-98 z. 22, Valparaiso', 'pais_id' => 3]
        ];

        foreach($oficinas as $oficina){
        	App\Oficina::create($oficina);
	    }
    }
}

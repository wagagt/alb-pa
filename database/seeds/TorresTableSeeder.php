<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class TorresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $torres=[
		['nombre' => 'Torre 1', 'direccion' => 'direccion 1',  'niveles' => '10', 'oficina_id' => '1'],
		['nombre' => 'Torre 2', 'direccion' => 'direccion 2',  'niveles' => '20', 'oficina_id' => '2']
        ];

        foreach($torres as $torre){
        	App\Torre::create($torre);
        }
    }
}
 	
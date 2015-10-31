<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ProyectosTableSeeder extends Seeder {
public function run()
 {
    $proyectos = 
    [
     ['nombre'          => 'proyecto uno',          'profundidad'       => 700, 
     'perforado'        => 'perforado1',            'diametro'          => 4, 
     'maquina'          => 'M-3',                   'metodo'            => 'Roto-Percusión',
     'observaciones'    => 'Obs. proyecto uno',     'id_estado'         => 1,
     'id_cliente'       => 2
     ],
     ['nombre'          => 'proyecto dos',          'profundidad'       => 800, 
     'perforado'        => 'perforado2',            'diametro'          => 6, 
     'maquina'          => 'M-4',                   'metodo'            => 'Percusión',
     'observaciones'    => 'Obs. proyecto dos',     'id_estado'         => 1,
     'id_cliente'       => 2
     ],
     ['nombre'          => 'proyecto tres',          'profundidad'       => 900, 
     'perforado'        => 'perforado3',            'diametro'          => 8, 
     'maquina'          => 'M-10',                   'metodo'            => 'Percusión',
     'observaciones'    => 'Obs. proyecto tres',     'id_estado'         => 1,
     'id_cliente'       => 3
     ],
     ['nombre'          => 'proyecto cuatro',       'profundidad'       => 1000, 
     'perforado'        => 'perforado4',            'diametro'          => 10, 
     'maquina'          => 'M-11',                  'metodo'            => 'Rotativo',
     'observaciones'    => 'Obs. proyecto cuatro',  'id_estado'         => 1,
     'id_cliente'       => 4
     ]
    ];
    DB::table('proyectos')->insert($proyectos);
 }
 
}

<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ComentariosTableSeeder extends Seeder {
public function run()
 {
    $comentarios = 
    [
     ['comentario'  => 'comentario uno',        'avance'        => 70, 
     'horas'        => 10,                      'id_proyecto'   => 1, 
     ],
     ['comentario'  => 'comentario dos',        'avance'        => 70, 
     'horas'        => 20,                      'id_proyecto'   => 2, 
     ],
     ['comentario'  => 'comentario tres',       'avance'        => 70, 
     'horas'        => 30,                      'id_proyecto'   => 3, 
     ],
     ['comentario'  => 'comentario cuatro',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 4, 
     ]
     
    ];
    DB::table('comentarios')->insert($comentarios);
 }
 
}

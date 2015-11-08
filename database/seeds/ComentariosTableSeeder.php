<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ComentariosTableSeeder extends Seeder {
public function run()
 {
    $comentarios = 
    [
     ['comentario'  => 'comentario uno',        'avance'        => 70, 
     'horas'        => 10,                      'id_proyecto'   => 1,  'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario dos',        'avance'        => 70, 
     'horas'        => 20,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario tres',       'avance'        => 70, 
     'horas'        => 30,                      'id_proyecto'   => 3, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario cuatro',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 4, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario cinco',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 6',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 7',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 8',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 9',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 10',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 11',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 12',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 13',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 14',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ],
     ['comentario'  => 'comentario 15',     'avance'        => 70, 
     'horas'        => 40,                      'id_proyecto'   => 2, 'created_at' => new DateTime
     ]
     
    ];
    DB::table('comentarios')->insert($comentarios);
 }
 
}

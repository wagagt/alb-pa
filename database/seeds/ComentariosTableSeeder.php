<?php
 
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ComentariosTableSeeder extends Seeder {
public function run()
 {
  
   $faker = Faker\Factory::create();
   for ($i=0; $i < 500; $i++) {
     $comentarios = 
     [
      ['comentario'   => $faker->sentence($nbWords = 10),        
      'avance'        => $faker->numberBetween($min = 10, $max = 150), 
      'horas'         => $faker->numberBetween($min = 1, $max = 15),                      
      'id_proyecto'   => $faker->numberBetween($min = 1, $max = 4),  
      'created_at'    => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now')
      ]
     ];
     DB::table('comentarios')->insert($comentarios);
   }//for
   
 }//function
 
}//class

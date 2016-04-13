<?php

use Illuminate\Database\Seeder;

class MarcaAutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $marcas = [

    ['marca' => 'Abarth'],
    ['marca' => 'Alfa Romeo'],
    ['marca' => 'Aston Martin'],
    ['marca' => 'Audi'],
    ['marca' => 'Bentley'],
    ['marca' => 'BMW'],
    ['marca' => 'Cadillac'],
    ['marca' => 'Caterham'],
    ['marca' => 'Chevrolet'],
    ['marca' => 'Citroen'],
    ['marca' => 'Dacia'],
    ['marca' => 'Ferrari'],
    ['marca' => 'Fiat'],
    ['marca' => 'Ford'],
    ['marca' => 'Honda'],
    ['marca' => 'Hyundai'],
    ['marca' => 'Infiniti'],
    ['marca' => 'Isuzu'],
    ['marca' => 'Iveco'],
    ['marca' => 'Jaguar'],
    ['marca' => 'Jeep'],
    ['marca' => 'Kia'],
    ['marca' => 'KTM'],
    ['marca' => 'Lada'],
    ['marca' => 'Lamborghini'],
    ['marca' => 'Lancia'],
    ['marca' => 'Land Rover'],
    ['marca' => 'Lexus'],
    ['marca' => 'Lotus'],
    ['marca' => 'Maserati'],
    ['marca' => 'Mazda'],
    ['marca' => 'McLaren'],
    ['marca' => 'Mercedes-Benz'],
    ['marca' => 'Mini'],
    ['marca' => 'Mitsubishi'],
    ['marca' => 'Morgan'],
    ['marca' => 'Nissan'],
    ['marca' => 'Opel'],
    ['marca' => 'Peugeot'],
    ['marca' => 'Piaggio'],
    ['marca' => 'Porsche'],
    ['marca' => 'Renault'],
    ['marca' => 'Rolls-Royce'],
    ['marca' => 'Seat'],
    ['marca' => 'Skoda'],
    ['marca' => 'Smart'],
    ['marca' => 'SsangYong'],
    ['marca' => 'Subaru'],
    ['marca' => 'Suzuki'],
    ['marca' => 'Tata'],
    ['marca' => 'Tesla'],
    ['marca' => 'Toyota'],
    ['marca' => 'Volkswagen'],
    ['marca' => 'Volvo']
  ];

  foreach ($marcas as $marca) {
    App\Marca_vehiculo::create($marca);
  }
    }
}

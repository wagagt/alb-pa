<?php
use Faker\Generator;
use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(User::class,function(Generator $faker){
  $array = [
      'name'        => $faker->name,
      'user_name'   => $faker->firstName,
      'email'       => str_random(5).'@gmail.com',
      'password'    => bcrypt('123456'),

  ];

  return $array;
});

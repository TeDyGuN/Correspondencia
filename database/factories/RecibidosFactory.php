<?php

use Faker\Generator as Faker;

$factory->define(App\Recibidos::class, function (Faker $faker) {
    return [
      'id_recibido' => 1,
      'tipo' => $faker->randomElement(['Carta' ,'Recibo', 'Factura', 'Otros']),
      'f_creacion' => $faker->date,
      'codigo' => 'R-002',
      'remitente' => $faker->catchPhrase,
      'referencia' => $faker->realText($maxNbChars = 20, $indexSize = 2),
      'adjunto' => $faker->randomElement(['Carta' ,'Recibo', 'Factura', 'Otros']),
      'file' => $faker->randomElement(['Carta' ,'Recibo', 'Factura', 'Otros']),
      'observacion' => $faker->realText($maxNbChars = 20, $indexSize = 2),
      'estado' => $faker->randomElement(['Abierto' ,'Cerrado']),
      'id_user' => $faker->numberBetween($min = 1, $max = 12),
      'id_user_destino' => $faker->numberBetween($min = 1, $max = 12)
    ];
});

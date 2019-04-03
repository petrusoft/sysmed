<?php

use Faker\Generator as Faker;

$factory->define(App\Paciente::class, function (Faker $faker) {
    return [
        'codigo' => $faker->unique()->randomNumber(5),
        /* 'dni_id' => function () {
            return factory(App\Dni::class)->create()->id;
        }, */
        'dni_id' => App\Dni::all()->random()->id,
        'numero' => $faker->unique()->randomNumber(5),
        'nombre' => $faker->name,
        'genero' => $faker->randomElement(['MASCULINO','FEMENINO','OTRO']),
        'raza' => $faker->sentence(5),
        'estatura' => $faker->randomFloat(2),
        'peso' => $faker->randomFloat(2),
        'tipo_sangre' => $faker->randomElement(['O+','O-','B+','B-','A+','A-','AB+','AB-']),
        'fecha_nacimiento' => $faker->dateTime(),
        'estado_civil' => $faker->randomElement(['SOLTERO','CASADO','VIUDO']),
        'ciudad' => $faker->city,
        'direccion' => $faker->address,
        'movil' => $faker->phoneNumber,
        'telefono' => $faker->randomNumber,
        'email' => $faker->unique()->safeEmail,
        'nivel_academico' => $faker->name,
        'titulo_academico' => $faker->company,
        'ocupacion' => $faker->jobTitle,
        'religion' => $faker->name,
        'imagen' => $faker->state,
        'web_url' => $faker->name,
        'familiar_nombre' => $faker->firstName,
        'familiar_parentesco' => $faker->title,
        'familiar_telefono' => $faker->phoneNumber,
        'observacion' => $faker->text,
        'created_by' => $faker->localIpv4
    ];
});

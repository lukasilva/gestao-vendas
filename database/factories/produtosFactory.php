<?php

use Faker\Generator as Faker;
use App\Categoria;

$factory->define(App\Produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'categoria_id' => rand(1,4),
        'pessoa_id' => rand(2,3),
        'descricao' => $faker->text,
        'valor' => $faker->randomFloat(2),
        'imagem' => json_encode($faker->image('public/storage/images',400,300, null, false)),
        'quantidade' => $faker->randomDigit
    ];
});

<?php

namespace Database\Factories;

use App\Models\Catogary;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'slug' => $faker->slug(),
        'is_active' => $faker->boolean(),

    ];
});
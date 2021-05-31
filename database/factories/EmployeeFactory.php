<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/** @var \Illuminate\Database\Eloquent\Factory $factory */


$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'tel' => $faker->unique()->phoneNumber,
        'prefecture' => $faker->unique()->state,
        'city' => $faker->unique()->city,
        'street' => $faker->unique()->streetName,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

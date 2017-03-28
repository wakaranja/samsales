<?php

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Property::class, function (Faker\Generator $faker) {


    return [
        'name' => $faker->sentences($nb = 1, $asText = true),
        'client' => $faker->name,
        'sale_type' => $faker->randomElement($array = array ('cash','hire purchase')),
        'date_registered' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
        'deal_status' => $faker->randomElement($array = array ('pending','closed')),
        'review' => $faker->sentences($nb = 3, $asText = true),
        'user_id' => $faker->randomDigitNotNull,
        'image' => $faker->randomElement($array = array ('property2.jpg','property3.jpg','property4.jpg')),
    ];
});

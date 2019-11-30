<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    $email = $faker->unique()->safeEmail;

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $email,
        'password' => $email, // password
    ];
});

$factory->define(\App\Address::class, function (Faker $faker) {

    return [
        'street_address' => $faker->streetName,
        'city' => $faker->city,
        'landmark' => "",
        'state' => $faker->state,
        'country' => $faker->country,
        'pincode' => $faker->postcode

    ];
});


$factory->define(\App\Order::class, function (Faker $faker) {

    return [

    ];
});

$factory->define(\App\OrderItem::class, function (Faker $faker) {

    return [

    ];
});
$factory->define(\App\Pizza::class, function (Faker $faker) {

    return [
        'title' => "Piz-" . $faker->jobTitle,
        'description' => $faker->realText(),
        'price'=>$faker->randomFloat(2, 3, 10),
        'imageUrl' => 'http://lorempixel.com/g/100/100/food',
    ];
});

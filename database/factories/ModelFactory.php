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
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'netid' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('secret'),
        'remember_token' => str_random(10),
        'stage' => 'HUNT',
        'team_id' => 1,
        'points' => 0,
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Waypoint::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->name,
        'description' => $faker->paragraph(1),
        'content' => $faker->paragraph(6),
        'image' => 'https://via.placeholder.com/150x150',
        'background_image' => 'https://via.placeholder.com/1920x1080',
        'default' => 0,
        'code' => str_random(10)
    ];

});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Team::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'image' => 'https://via.placeholder.com/150x150',
        'points' => 0,
    ];

});

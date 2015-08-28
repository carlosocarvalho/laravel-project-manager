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

$factory->define(CocProject\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});



$factory->define(CocProject\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'email'       => $faker->email,
        'responsible' => $faker->name,
        'address'     => $faker->address ,
        'phone'       =>  $faker->phoneNumber,
        'obs'         => $faker->sentence(10)
    ];
});



$factory->define(CocProject\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id'     => rand(1,5),
        'client_id'    => rand(1,10),
        'name'         => $faker->word,
        'description'  => $faker->sentence(10),
        'due_date'     => $faker->date('Y-m-d'),
        'status'       => rand(1,3)
    ];
});


$factory->define(CocProject\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id'     => rand(1,10),
        'title'          => $faker->word,
        'note'           => $faker->paragraph(),

    ];
});

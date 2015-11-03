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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Journal::class, function (Faker\Generator $faker) {
    $data = [
        'name' => $faker->title,
        'description' => $faker->paragraph(4),
        'severity' => $faker->numberBetween(0,10),
        'location' => $faker->city,
        'weather' => $faker->sentence,
        'noise_level' => $faker->numberBetween(0,10),
        'light_level' => $faker->numberBetween(0,10),
        'still_suffering' => $faker->boolean(),
        'start_time' => $faker->time(),
        'end_time' => $faker->time(),
        'has_aura' => $faker->boolean(),
        'has_nausea' => $faker->boolean(),
        'has_vomitted' => $faker->boolean(),
        'has_light_sensativity' => $faker->boolean(),
        'has_sound_sensativity' => $faker->boolean(),
        'has_disrupted' => $faker->boolean(),
        'missed_workschool' => $faker->boolean(),
        'missed_routines' => $faker->boolean(),
    ];
    if($data['has_aura'])
        $data['aura_description'] = $faker->paragraph(3);
    return $data;
});
$factory->define(App\Medicine::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'dose' => $faker->numberBetween(0,10),
        'description' => $faker->paragraph(3),
    ];
});
$factory->define(App\Trigger::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(3),
    ];
});
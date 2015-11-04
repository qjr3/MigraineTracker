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
    $number =$faker->numberBetween(1,22);
    switch($number){
        case 1:
            $gender = 'Androgynous';
            break;
        case 2:
            $gender = 'Agender';
            break;
        case 3:
            $gender = 'Bigender';
            break;
        case 4:
            $gender = 'Cisgender Female';
            break;
        case 5:
            $gender = 'Cisgender Male';
            break;
        case 6:
            $gender = 'FTM';
            break;
        case 7:
            $gender = 'Gender Fluid';
            break;
        case 8:
            $gender = 'Gender Nonconforming';
            break;
        case 9:
            $gender = 'Gender Variant';
            break;
        case 10:
            $gender = 'Genderqueer';
            break;
        case 11:
            $gender = 'Intersex';
            break;
        case 12:
            $gender = 'MTF';
            break;
        case 13:
            $gender = 'Neither';
            break;
        case 14:
            $gender = 'Neutrois';
            break;
        case 15:
            $gender = 'Non-Binary';
            break;
        case 16:
            $gender = 'Other';
            break;
        case 17:
            $gender = 'Pangender';
            break;
        case 18:
            $gender = 'Transgender';
            break;
        case 19:
            $gender = 'Transsexual Person';
            break;
        case 20:
            $gender = 'Transmasculine';
            break;
        case 21:
            $gender = 'Transfeminine';
            break;
        case 22:
            $gender = 'Two-Spirit';
            break;
    }
    return [
        'name' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt('password'),
        'gender' => $gender,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date,
        'has_diabetes' => $faker->boolean(),
        'has_glasses' => $faker->boolean(),
        'last_eye_exam' => $faker->date,
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Journal::class, function (Faker\Generator $faker) {
    $data = [
        'name' => $faker->word,
        'description' => $faker->paragraph(4),
        'severity' => $faker->numberBetween(0,10),
        'loc_long' => $faker->longitude,
        'loc_lat' => $faker->latitude,
        //weather' => $faker->sentence,
        'sound_level' => $faker->numberBetween(0,10),
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
        'dose' => $faker->numberBetween(0,10).'mg',
        'description' => $faker->paragraph(3),
    ];
});
$factory->define(App\Trigger::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(3),
    ];
});
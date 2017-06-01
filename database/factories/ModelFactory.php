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

/** @var \Illuminate\Database\Eloquent\Factory $factory 
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/

$factory->define(App\Emploi::class, function (Faker\Generator $faker) {

    return [
        'JOBURL' => $faker->name,
        'SALARYMAX' => '$50,000',
        'SALARYMIN' => '$40,000',
        'SALARYTYPE' => 'annual',
        'NAME' => implode('',$faker->words(2)),
        'POSITION' => $faker->sentence,
        'JOBREF' => str_random(10),
        'JOB_SUMMARY' => $faker->text,
        'tweeted' => false,
        'POSTDATE' => $faker->dateTime(),
        'EXPIRYDATE' => $faker->dateTime(),
        'slug' => str_random(10),
    ];
});


$factory->define(App\Description::class, function ($faker) use ($factory) {



    return [

    'KNOWLEDGE' => $faker->text,
    'LANGUAGE_CERTIFICATES' => $faker->text,
    'EDUCATIONANDEXP' => $faker->text,
    'COMPANY_DESC' => $faker->text,
    'POSTDATE' => $faker->dateTime(),
    'emploi_id' => factory(App\Emploi::class)->create()->id

    ];
});


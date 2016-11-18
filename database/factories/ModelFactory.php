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
        'email' => $faker->safeEmail,
        'school_id' => '214IT'.$faker->firstName('male'),
        // 'password' => bcrypt(str_random(10)),
        // 'remember_token' => str_random(10),
    ];
});

$factory->define(App\DesignEntry::class,function(Faker\Generator $faker){
  return [
    'designer' => $faker->name,
    'email' => $faker->safeEmail(),
    'phone' => $faker->phoneNumber(),
    'description' => $faker->sentence(3),
    'src' => $faker->imageUrl( 640, 480),
  ];
});

$factory->define(App\Vote::class,function(Faker\Generator $faker){
  return [
    'voter_id' => App\User::all()->random()->id,
    'design_entry_id' => App\DesignEntry::all()->random()->id,
  ];
});

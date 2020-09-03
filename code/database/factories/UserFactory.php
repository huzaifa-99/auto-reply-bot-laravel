<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'profile_image' => 'http://via.placeholder.com/150',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // radius_server_secret(radius_handle)
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Message::class, function (Faker $faker) {
	do{
		$from = rand(1,15);
		$to = rand(1,15);

	} 
	while ($from === $to);
    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence
    ];
});

$factory->define(App\Subject::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'registered_by_admin' => $faker->name,
    ];
});

$factory->define(App\Question::class, function (Faker $faker) {
    do{
        $subject = rand(1,10);
        $uploaded_by_admin = rand(1,5);

    } 
    while ($subject === $uploaded_by_admin);
    return [
        'subject' => $subject,
        'uploaded_by_admin' => $uploaded_by_admin,
        'profile_image' => 'http://via.placeholder.com/150',
        'question' => $faker->sentence,
        'answer' => $faker->sentence
    ];
});
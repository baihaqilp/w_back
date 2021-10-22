<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone' => $faker->phoneNumber,
        'jenis_kelamin' => 'laki-laki',
        'No_anggota_umum' => '1111111',
        'password' => \Illuminate\Support\Facades\Hash::make($faker->password),
        'remember_token' => \Illuminate\Support\Str::random(8),
        'created_at' => $faker->dateTimeBetween('now','+1 years')
    ];
});

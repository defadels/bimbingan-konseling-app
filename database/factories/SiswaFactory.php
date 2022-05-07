<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Kelas;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function (Faker $faker) {
  
    return [
        'nama' => $faker->name,
        'nis' => $faker->unique()->randomNumber(8, false),
        'nip' => $faker->unique()->randomNumber(8, false),
        'email' => $faker->unique()->safeEmail,
        'mapel' => $faker->jobtitle,
        'email_verified_at' => now(),
        'password' => Hash::make('janganlupa'),
        'jenis' => $faker->randomElement(['siswa','guru']),
        'nomor_hp' => $faker->phoneNumber(),
        'status' => $faker->randomElement(['aktif','nonaktif']),
        'jenis_kelamin' => $faker->randomElement(['laki-laki','perempuan']),
        'agama' => $faker->randomElement(['islam','kristen','protestan','hindu','buddha','khonghucu']),
        'alamat' => $faker->address,
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->date,
        'remember_token' => Str::random(10),
        'kelas_id' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9]),
    ];
});

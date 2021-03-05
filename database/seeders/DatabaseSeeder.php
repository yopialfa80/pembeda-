<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yovie Alfa Guistuta',
            'username' => 'yoviealfa@gmail.com',
            'id_kelas' => '9A',
            'password' => Hash::make('admin'),
            'roles' => 'User',
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(100),
        ]);

        DB::table('users')->insert([
            'name' => 'I Made Sattvikas',
            'username' => 'made@gmail.com',
            'id_kelas' => 'GURU',
            'password' => Hash::make('admin'),
            'roles' => 'Guru',
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(100),
        ]);

        DB::table('users')->insert([
            'name' => 'Jaya Sanjaya',
            'username' => 'jaya@gmail.com',
            'id_kelas' => 'ADMIN',
            'password' => Hash::make('admin'),
            'roles' => 'Admin',
            'email_verified_at' => Carbon::now(),
            'remember_token' => Str::random(100),
        ]);
    }
}

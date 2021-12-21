<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'classe_id' => "0",
            'name' => "Admin Ganteng",
            'role' => "admin",
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'foto' => 'admin.svg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        DB::table('users')->insert([
            'classe_id' => "1",
            'name' => "Rifki Romadhan",
            'role' => "guru",
            'email' => 'georgeikkirama@gmail.com',
            'password' => bcrypt('12345'),
            'foto' => 'guru.svg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        DB::table('users')->insert([
            'classe_id' => "2",
            'name' => "Fajar Kimak",
            'role' => "guru",
            'email' => 'fajar@gmail.com',
            'password' => bcrypt('12345'),
            'foto' => 'guru.svg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);

        DB::table('users')->insert([
            'classe_id' => "3",
            'name' => "Agas Kimak",
            'role' => "guru",
            'email' => 'agas@gmail.com',
            'password' => bcrypt('12345'),
            'foto' => 'guru.svg',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'created_at'=> now(),
            'updated_at'=> now()
        ]);
    }
}

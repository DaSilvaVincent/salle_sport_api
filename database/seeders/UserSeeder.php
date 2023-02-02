<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory([
            'name' => "Robert Duchmol",
            'email' => "robert.duchmol@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('GrosSecret'),
            'remember_token' => Str::random(10),
        ])->create();
        User::factory(5)->create();

    }
}


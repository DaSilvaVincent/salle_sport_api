<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
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
        User::factory([
            'name' => "Vincent DaSilva",
            'email' => "vincent.silva@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('EnormeSecret'),
            'remember_token' => Str::random(10),
        ])->create();
        User::factory([
            'name' => "Thimo Lepetz",
            'email' => "thimo.lepetz@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('Secret'),
            'remember_token' => Str::random(10),
        ])->create();
        User::factory([
            'name' => "Thomas Hanart",
            'email' => "thomas.hanart@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('MonSecret'),
            'remember_token' => Str::random(10),
        ])->create();
        User::factory([
            'name' => "Arnaud Fievet",
            'email' => "arnaud.fievet@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('UnSecret'),
            'remember_token' => Str::random(10),
        ])->create();
        User::factory(5)->create();

    }
}


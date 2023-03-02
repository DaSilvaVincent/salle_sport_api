<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $robert = User::findOrFail(1);
        $robert->roles()->attach([1, 2, 3, 4, 5]);
        $robert->save();

        $vincent = User::findOrFail(2);
        $vincent->roles()->attach([2, 3, 4, 5]);
        $vincent->save();

        $thimo = User::findOrFail(3);
        $thimo->roles()->attach([3, 4, 5]);
        $thimo->save();

        $thomas = User::findOrFail(4);
        $thomas->roles()->attach([4, 5]);
        $thomas->save();

        $arnaud = User::findOrFail(5);
        $arnaud->roles()->attach([5]);
        $arnaud->save();

        for ($i = 6; $i <= 10; $i++) {
            $user = User::findOrFail($i);
            for ($j = $i; $j <= 5; $j++)
                $user->roles()->attach($j);
            $user->save();
        }

    }

}

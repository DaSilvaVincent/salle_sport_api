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
        for ($i = 2; $i <= 5; $i++) {
            $user = User::findOrFail($i);
            for ($j = $i; $j <= 5; $j++)
                $user->roles()->attach($j);
            $user->save();
        }

    }

}

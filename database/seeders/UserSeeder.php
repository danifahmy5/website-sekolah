<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'name' => 'ros',
        //     'email' => 'danifahmy5@gmail.com',
        //     'password' => Hash::make('123123')
        // ]);
        $faker = Factory::create();
        for ($i = 0; $i < 101; $i++) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('123123')
            ]);
        }
    }
}

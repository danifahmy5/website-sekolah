<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        for ($i = 10; $i < 100; $i++) {
            Teacher::create([
                'name' => $faker->name(),
                'major' => $faker->jobTitle(),
                'email' => $faker->email(),
                'phone' => $faker->phoneNumber(),
                'image' => $faker->imageUrl(278, 300, 'people'),
                'status' => true,
                'description' => $faker->text(),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}

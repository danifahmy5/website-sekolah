<?php

namespace Database\Seeders;

use App\Models\Major;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 6; $i++) {
            Major::create([
                'title' => $faker->word(),
                'subtitle' => $faker->words(3, true),
                'description' => $faker->text(),
                'image' => $faker->imageUrl()
            ]);
        }
    }
}

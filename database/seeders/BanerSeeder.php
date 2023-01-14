<?php

namespace Database\Seeders;

use App\Models\Baner;
use Faker\Factory;
use Illuminate\Database\Seeder;

class BanerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        Baner::create([
            'title' => 'Title 1',
            'image' => $faker->imageUrl(2000, 1333, 'people'),
            'link' => 'http://127.0.0.1:8000'
        ]);

        Baner::create([
            'title' => 'Title 2',
            'image' => $faker->imageUrl(2000, 1333, 'people'),
            'link' => 'http://127.0.0.1:8000'
        ]);

        Baner::create([
            'title' => 'Title 3',
            'image' => $faker->imageUrl(2000, 1333, 'people'),
            'link' => 'http://127.0.0.1:8000'
        ]);
    }
}

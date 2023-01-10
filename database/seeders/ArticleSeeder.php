<?php

namespace Database\Seeders;

use App\Models\Article;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $images = [
            $faker->imageUrl(500, 500, 'people'),
            $faker->imageUrl(500, 500, 'animals'),
            $faker->imageUrl(500, 500, 'plant'),
            $faker->imageUrl(500, 500, 'people'),
        ];

        for ($i = 10; $i < 100; $i++) {
            Article::create([
                'user_id' => 1,
                'category_id' => $faker->numberBetween(1, 4),
                'title' => $faker->sentence(),
                'image_title' => $faker->imageUrl(278, 300, 'people'),
                'images' => json_encode($images),
                'description' => $faker->text(5000),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Seni',
            'Olahraga',
            'Bahasa',
            'Makanan'
        ];

        foreach ($categories as $key => $category) {
            Category::create([
                'id' => $key + 1,
                'name' => $category
            ]);
        }
    }
}

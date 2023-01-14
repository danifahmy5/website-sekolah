<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'title' => 'SMK muhammadiyah 1 Sumbberejo',
            'email' => 'smkmuhammadiyah@gmail.com',
            'phone' => '087818298198',
            'address' => 'Sumberejo Bojonegoro',
            'website' => 'www.smkmuhammadiyah1sumberejo.sch.id',
        ]);
    }
}

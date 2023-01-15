<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Baner;
use App\Models\Major;
use App\Models\Teacher;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'page' => 'home',
            'baners' => Baner::active()->orderBy('id', 'DESC')->get(),
            'teachers' => Teacher::inRandomOrder()->limit(4)->get(),
            'majors' => Major::inRandomOrder()->limit(4)->get(),
            'articles' => Article::orderBy('id', 'DESC')->limit(3)->get(),
            'images' => Storage::files('public/images')
        ];

        return view('guest', $data);
    }
}

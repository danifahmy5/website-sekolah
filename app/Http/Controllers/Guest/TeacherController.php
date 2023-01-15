<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Guru',
            'page' => 'teacher',
            'teachers' => Teacher::all('name', 'image', 'major', 'description'),
        ];

        return view('guest.teachers', $data);
    }
}

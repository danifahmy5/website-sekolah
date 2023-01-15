<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Jurusan',
            'page' => 'major',
            'majors' => Major::active()->get(),
        ];

        return view('guest.majors', $data);
    }
}

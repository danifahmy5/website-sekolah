<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kontak',
            'page' => 'contact',
            'profile' => Profile::first()
        ];

        return view('guest.contact', $data);
    }
}

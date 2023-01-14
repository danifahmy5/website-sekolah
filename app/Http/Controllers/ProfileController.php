<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {

        $profile = Profile::first();
        return view('admin.profile', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            'address' => ['required'],
            'website' => ['required'],
        ]);

        $category = Profile::findOrFail($id);

        $category->update([
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
        ]);

        return redirect()->route('profiles.index', ['nama' => $category->name])->with('message', "berhasil update $category->name");;
    }
}

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

        // melakukan validasi jika terdapat isian value
        $this->_validationIfFieldExist($request, 'facebook');
        $this->_validationIfFieldExist($request, 'instagram');
        $this->_validationIfFieldExist($request, 'twitter');

        $category = Profile::findOrFail($id);

        $category->update([
            'title' => $request->input('title'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'website' => $request->input('website'),
            'facebook' => $request->input('facebook'),
            'instagram' => $request->input('instagram'),
            'twitter' => $request->input('twitter'),
        ]);

        return redirect()->route('profiles.index', ['nama' => $category->name])->with('message', "berhasil update $category->name");;
    }

    private function _validationIfFieldExist(Request $request, $input)
    {
        if ($request->input($input)) {
            $request->validate([
                $input => ['url'],
            ]);
        }
    }
}

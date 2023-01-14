<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\InsertRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('s');

        $teachers = Teacher::where(DB::raw("CONCAT(name,major,email)"), 'LIKE', "%$search%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertRequest $request)
    {
        $image = $request->file('image');
        $newNameImage = generateRandomString(20) . '.' . $image->getClientOriginalExtension();
        $image->storePubliclyAs('images', $newNameImage, 'public');

        $teacher = Teacher::create([
            'name' => $request->input('name'),
            'major' => $request->input('major'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'image' => $newNameImage,
            'description' => $request->input('description')
        ]);

        return redirect()->route('teacher.index')->with('message', "berhasil menambahkan $teacher->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return response()->view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $image = $teacher->image;
        //jika gambar di ganti
        if ($request->file('image')) {
            // mengambil nama gambar baru
            $image = generateRandomString(20) . '.' . $request->file('image')->getClientOriginalExtension();
            //upload foto baru
            $request->file('image')
                ->storePubliclyAs('images', $image, 'public');
            //menghapus foto yang lama
            $oldImage = Storage::path("public/images/$teacher->image");

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        $teacher->update([
            'name' => $request->input('name'),
            'major' => $request->input('major'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'image' => $image,
            'description' => $request->input('description')
        ]);

        return redirect()->route('teacher.index')->with('message', "berhasil update $teacher->name");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $image = Storage::path("public/images/$teacher->image");

        if (File::exists($image)) {
            File::delete($image);
        }

        $teacher->delete();

        return redirect()->route('teacher.index')->with('message', "berhasil menghapus $teacher->name");
    }
}

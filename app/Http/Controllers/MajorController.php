<?php

namespace App\Http\Controllers;

use App\Actions\UploadActions;
use App\Http\Requests\Major\InsertRequest;
use App\Http\Requests\Major\UpdateRequest;
use App\Models\Major;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('s');

        $majors = Major::where(DB::raw("CONCAT(title,subtitle)"), 'LIKE', "%$search%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertRequest $request)
    {


        $majors = Major::create([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'description' => $request->input('description'),
            'image' => UploadActions::singgleUpload($request->file('image')),
        ]);

        return redirect()->route('majors.index')->with('message', "berhasil menambahkan $majors->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $major = Major::findOrFail($id);

        return view('admin.majors.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $major = Major::findOrFail($id);

        return response()->view('admin.majors.edit', compact('major'));
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
        $majors = Major::findOrFail($id);
        $image = $majors->image;
        //jika gambar di ganti
        if ($request->file('image')) {
            UploadActions::deleteFile($image);
            $image = UploadActions::singgleUpload($request->file('image'));
        }

        $majors->update([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'description' => $request->input('description'),
            'image' => $image
        ]);

        return redirect()->route('majors.index')->with('message', "berhasil update $majors->name");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $majors = Major::findOrFail($id);
        UploadActions::deleteFile($majors->image);

        $majors->delete();

        return redirect()->route('majors.index')->with('message', "berhasil menghapus $majors->name");
    }

    public function toggle($id)
    {
        $major = Major::findOrFail($id);

        $major->update([
            'status' => !$major->status
        ]);

        return redirect()->route('majors.index')->with('message', "berhasil menonaktifkan $major->title");
    }
}

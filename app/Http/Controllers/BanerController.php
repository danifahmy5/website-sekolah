<?php

namespace App\Http\Controllers;

use App\Actions\UploadActions;
use App\Http\Requests\Baner\InsertRequest;
use App\Http\Requests\Baner\UpdateRequest;
use App\Models\Baner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BanerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('s');

        $baners = Baner::where(DB::raw("CONCAT(title,link)"), 'LIKE', "%$search%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('admin.baners.index', compact('baners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.baners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertRequest $request)
    {


        if (Baner::active()->count() > 2) {
            $baner = Baner::active()->first();
            $baner->update(['status' => false]);
        }

        $baners = Baner::create([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'image' => UploadActions::singgleUpload($request->file('image')),
        ]);

        return redirect()->route('baners.index')->with('message', "berhasil menambahkan $baners->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baner = Baner::findOrFail($id);

        return view('admin.baners.show', compact('baner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $baner = Baner::findOrFail($id);

        return response()->view('admin.baners.edit', compact('baner'));
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
        $baners = Baner::findOrFail($id);
        $image = $baners->image;
        //jika gambar di ganti
        if ($request->file('image')) {
            UploadActions::deleteFile($image);
            $image = UploadActions::singgleUpload($request->file('image'));
        }

        $baners->update([
            'title' => $request->input('title'),
            'link' => $request->input('link'),
            'image' => $image
        ]);

        return redirect()->route('baners.index')->with('message', "berhasil update $baners->name");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baners = Baner::findOrFail($id);
        UploadActions::deleteFile($baners->image);

        $baners->delete();

        return redirect()->route('baners.index')->with('message', "berhasil menghapus $baners->name");
    }
    public function toggle($id)
    {
        $baner = Baner::findOrFail($id);

        if (Baner::active()->count() > 2 && $baner->status == false) {
            $message = 'Baner yang aktif maksimal 3';
            return redirect()->route('baners.index')->with('error', $message);
        }


        $baner->update([
            'status' => !$baner->status
        ]);

        return redirect()->route('baners.index')->with('message', "berhasil menonaktifkan $baner->title");
    }
}

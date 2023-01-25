<?php

namespace App\Http\Controllers;

use App\Actions\UploadActions;
use App\Http\Requests\Bkk\InsertRequest;
use App\Http\Requests\Bkk\UpdateRequest;
use App\Models\Bkk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BkkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('s');

        $bkks = Bkk::where(DB::raw("CONCAT(instance,industrial_sector,addr,whatsapp,email)"), 'LIKE', "%$search%")
            ->where('status', TRUE)
            ->orderBy('id', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('admin.bkk.index', compact('bkks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bkk.create');
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

        $bkk = Bkk::create([
            'instance' => $request->input('instance'),
            'industrial_secotor' => $request->input('industrial_secotor'),
            'addr' => $request->input('addr'),
            'email' => $request->input('email'),
            'whatsapp' => $request->input('whatsapp'),
            'image' => $newNameImage,
        ]);

        return redirect()->route('bkk.index')->with('message', "berhasil menambahkan $bkk->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bkk = Bkk::findOrFail($id);

        return view('admin.bkk.show', compact('bkk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bkk = Bkk::findOrFail($id);

        return response()->view('admin.bkk.edit', compact('bkk'));
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
        $bkk = Bkk::findOrFail($id);
        $image = $bkk->image;
        //jika gambar di ganti
        if ($request->file('image')) {
            //menghapus foto yang lama
            UploadActions::deleteFile($image);
            //upload gambar baru
            $image = UploadActions::singgleUpload($request->file('image'));
        }

        $bkk->update([
            'instance' => $request->input('instance'),
            'industrial_secotor' => $request->input('industrial_secotor'),
            'addr' => $request->input('addr'),
            'email' => $request->input('email'),
            'whatsapp' => $request->input('whatsapp'),
            'image' => $image,
        ]);

        return redirect()->route('bkk.index')->with('message', "berhasil update $bkk->name");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bkk = Bkk::findOrFail($id);
        UploadActions::deleteFile($bkk->image);

        $bkk->delete();

        return redirect()->route('bkk.index')->with('message', "berhasil menghapus $bkk->name");
    }

    public function toggle($id)
    {
        $bkk = Bkk::findOrFail($id);

        $bkk->update([
            'status' => !$bkk->status
        ]);

        return redirect()->route('bkk.index')->with('message', "berhasil menghapus $bkk->name");
    }
}

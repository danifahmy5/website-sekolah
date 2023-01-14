<?php

namespace App\Http\Controllers;

use App\Actions\UploadActions;
use App\Http\Requests\Article\InsertRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('s');

        $articles = Article::where(DB::raw("CONCAT(title)"), 'LIKE', "%$search%")
            ->orderBy('id', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertRequest $request)
    {
        $imageTitle = null;
        $imageBody = null;
        if ($request->input('image_title')) {
            $imageTitle = UploadActions::singgleUpload($request->file('image_title'));
        }
        if ($request->file('images')) {
            $imageBody = UploadActions::mutiUpload($request->file('images'));
        }

        $article = Article::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'image_title' => $imageTitle,
            'images' => json_encode($imageBody),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('articles.index')->with('message', "berhasil menambahkan $article->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::active();

        return response()->view('admin.articles.edit', compact('article', 'categories'));
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
        $article = Article::findOrFail($id);

        $imageTitle = $article->image_title;
        $imageBody = $article->images;

        if ($request->file('image_title')) {
            UploadActions::deleteFile($imageTitle);
            $imageTitle = UploadActions::singgleUpload($request->file('image_title'));
        }

        if ($request->file('images')) {
            if ($imageBody != "null") {
                foreach (json_decode($imageBody) as $key => $delete) {
                    UploadActions::deleteFile($delete);
                }
            }

            $imageBody = UploadActions::mutiUpload($request->file('images'));
            $imageBody = json_encode($imageBody);
        }



        $article->update([
            'category_id' => $request->input('category_id'),
            'title' => $request->input('title'),
            'image_title' => $imageTitle,
            'images' => $imageBody,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('articles.index')->with('message', "berhasil update $article->name");;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        //menghapus gambar judul
        UploadActions::deleteFile($article->image_title);
        //menghapus gambar body
        foreach (json_decode($article->images) as $key => $value) {
            UploadActions::deleteFile($value);
        }
        $article->delete();

        return redirect()->route('articles.index')->with('message', "berhasil menghapus $article->title");
    }
}

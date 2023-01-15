<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles =  Article::orderBy('id', 'DESC');
        $category = $request->query('category', 0);

        if ($category) {
            if (Category::where('id', $category)->count() > 0) {
                $articles = $articles->where('category_id', $category);
            }
        }

        $articles = $articles->paginate(9)->withQueryParams();
        $data = [
            'title' => 'Kegiatan',
            'page' => 'article',
            'articles' => $articles,
        ];
        // return response()->json($data['articles']);

        return view('guest.articles', $data);
    }

    public function show($id)
    {
        $data = [
            'title' => 'Detail kegiatan',
            'page' => 'article',
            'article' =>  Article::findOrFail($id),
            'categories' => Category::all('id', 'name')
        ];


        return view('guest.showArticle', $data);
    }
}

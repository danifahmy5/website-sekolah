<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $articles =  Article::orderBy('id', 'DESC');
        $category = $request->query('category', 0);
        $hashtag = $request->query('hashtag', 0);
        $search = $request->query('s', 0);

        if ($category) {
            if (Category::where('id', $category)->count() > 0) {
                $articles = $articles->where('category_id', $category);
            }
        }

        if ($hashtag) {
            $articles = $articles->where('description', 'like', "%#$hashtag%");
        }

        if ($search) {
            $articles = $articles->where(DB::raw("CONCAT(title, description)"), 'like', "%$search%");
        }


        $articles = $articles->paginate(9)->withQueryString();
        $data = [
            'title' => 'Kegiatan',
            'page' => 'article',
            'articles' => $articles,
            'search' => $search,
        ];

        return view('guest.articles', $data);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);


        $data = [
            'title' => $article->title,
            'page' => 'article',
            'article' =>  $article,
            'hashtags' =>  searchHashtag($article->description),
            'categories' => Category::all('id', 'name'),
            'articles' => Article::inRandomOrder()->limit(3)->get()
        ];

        return view('guest.showArticle', $data);
    }
}

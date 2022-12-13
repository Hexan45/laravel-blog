<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DefaultController extends Controller
{
    public function index() : mixed {

        $articles = Article::orderBy('article_created_at', 'desc')->take(5)->get();

        return view('home', [
            'section' => 'Najnowsze artykuły',
            'data' => $articles
        ]);
    }

    public function articles() : mixed {
        return 'Articles';
    }

    public function article(Article $article) : mixed {
        return view('show', [
            'articleData' => $article,
            'articleAuthor' => $article->author,
            'articleCategory' => $article->category
        ]);
    }

    public function about() : mixed {
        return 'About';
    }

    public function contact() : mixed {
        return 'Contact';
    }
}

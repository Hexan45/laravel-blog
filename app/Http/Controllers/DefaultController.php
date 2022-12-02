<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class DefaultController extends Controller
{
    public function index() : mixed {
        return view('home', [
            'section' => 'Najnowsze artykuły',
            'data' => Article::orderBy('article_created_at', 'desc')->take(5)->get()
        ]);
    }

    public function articles() : string {
        return 'Articles';
    }

    public function article(Article $article) : string {
        return view('show', [
            'articleData' => $article
        ]);
    }

    public function about() : string {
        return 'About';
    }

    public function contact() : string {
        return 'Contact';
    }
}

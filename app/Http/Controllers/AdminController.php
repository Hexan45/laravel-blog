<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;

class AdminController extends Controller
{

    const READABLE_INPUTS = [
        'title' => 'Tytuł',
        'excerpt' => 'Streszczenie',
        'description' => 'Treść',
        'image_path' => 'Zdjęcie'
    ];

    public function index() : mixed {
        $articles = Article::paginate(5);
        return view('admin.dashboard', [
            'articles' => $articles
        ]);
    }

    public function edit(Article $article) : mixed {
        return view('admin.edit', [
            'articleData' => $article
        ]);
    }

    private function updatedData(Article $article) : string {
        $filteredData = array_filter($article->getFillable(), fn($value) => $article->wasChanged($value));
        $result = [];

        array_walk($filteredData, function($fData, $kData) use (&$result) {
            $result[] = self::READABLE_INPUTS[$fData];
        });

        return implode(', ', $result);
    }

    private function storeFile(Request $request) : string {
        $file = $request->file('image_file');
        return Storage::disk('public')->putFileAs(
            'images', $file, $file->hashName()
        );
    }

    public function saveEdit(Article $article, Request $request) : mixed {
        $article->title = $request->input('title');
        $article->excerpt = $request->input('excerpt');
        $article->description = $request->input('description');

        $request->whenHas('image_file', function($inputValue) use($request, $article) {

            if($request->file('image_file')->isValid()) {
                $article->image_path = $this->storeFile($request);
            } else {
                return back()
                    ->with('status', [
                        'type' => 'error',
                        'header' => 'Wystąpił nieznany błąd',
                        'message' => 'Wykryto nieznany błąd spowodowany transferem pliku na serwer serwisu'
                    ]);
            }

        });

        $article->save();

        if($article->wasChanged()) {
            return back()
            ->with('status', [
                'type' => 'success',
                'header' => 'Sukces',
                'message' => 'Zaktualizowano następujące dane w artykule: ' . $this->updatedData($article)
            ]);
        }

        return back()
            ->with('status', [
                'type' => 'notice',
                'header' => 'Nie zaktualizowano artykułu',
                'message' => 'Artykuł nie został zaktualizowany ze względu na brak zmian w polach formularza'
            ]);
    }

    public function delete(Article $article) : mixed {
        $article->delete();
        return back();
    }

    public function create() : mixed {
        return view('admin.create', [
            'categoryList' => Category::all()
        ]);
    }

    private function validatorStore(Request $request) {
        return Validator::make($request->all(), [
            'title' => ['required', 'min:10', 'max:60'],
            'excerpt' => ['required', 'min:20', 'max:200'],
            'description' => ['required', 'min:100'],
            'image_alternate' => ['required', 'min:20'],
            'category_name' => ['required'],
            'image_file' => ['required', 'mimes:jpg,jpe,jpeg,png', 'file', 'max:4096', 'dimensions:min_width:500,min:height:300,max_width:1200,max_height:630']
        ]);
    }

    public function store(Request $request) : mixed {

        $validator = $this->validatorStore($request);

        if($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $validatedData = $validator->validated();

        if(!$request->file('image_file')->isValid()) {
            return back()->with('status', [
                'type' => 'error',
                'header' => 'Wystąpił nieznany błąd',
                'message' => 'Wykryto nieznany błąd spowodowany transferem pliku na serwer serwisu'
            ]);
        }

        Article::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'excerpt' => $validatedData['excerpt'],
            'image_path' => $this->storeFile($request),
            'author_id' => Auth::user()->getUserID(),
            'image_alternate' => $validatedData['image_alternate'],
            'category_id' => $validatedData['category_name']
        ]);

        return back()->with('status', [
            'type' => 'success',
            'header' => 'Pomyślnie dodano artykuł',
            'message' => 'Artykuł został dodany pomyślnie, jest dostępny teraz w serwisie'
        ]);

    }
}

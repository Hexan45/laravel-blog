@extends('layouts.index')

@section('meta')
    <meta charset="utf-8">
    <meta name="description" content="This is a desc">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />

    <link rel="canonical" href="http://localhost:8000/" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="{{ asset('js/enum.js') }}"></script>

    <title>Panel Administratora</title>
@endsection

@section('content')
    <div class="form_container admin">
        @if(session()->has('status'))
            <x-notification-template
                :notificationType="session('status')['type']"
                :notificationHeader="session('status')['header']"
                :notificationMessage="session('status')['message']"
            />
        @endif
        <h2 class="form_name">Dodaj nowy wpis na blogu</h2>
        <form action="{{ route('admin.dashboard.store.create') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <label for="title">
                <span class="label_name">Tytuł</span>
                <input type="text" id="title" class="input" name="title" placeholder="Wpisz tytuł artykułu" value="{{ old('title') }}" />
                @if($errors->has('title'))
                    <span class="error validator">{{ $errors->first('title') }}</span>
                @endif
            </label>

            <label for="excerpt">
                <span class="label_name">Streszczenie</span>
                <textarea type="text" id="excerpt" name="excerpt" class="textarea" placeholder="Podaj krótkie streszczenie swojego artykułu">{{ old('excerpt') }}</textarea>
                @if($errors->has('excerpt'))
                    <span class="error validator">{{ $errors->first('excerpt') }}</span>
                @endif
            </label>

            <label for="description">
                <span class="label_name">Treść</span>
                <textarea type="text" id="description" name="description" class="textarea description" placeholder="Wprowadź treść artykułu">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="error validator">{{ $errors->first('description') }}</span>
                @endif
            </label>

            <label for="image_alternate">
                <span class="label_name">Opis zdjęcia</span>
                <input type="text" id="image_alternate" class="input" name="image_alternate" placeholder="Podaj którtki opis zdjęcia" value="{{ old('image_alternate') }}" />
                @if($errors->has('image_alternate'))
                    <span class="error validator">{{ $errors->first('image_alternate') }}</span>
                @endif
            </label>

            <label for="category_enum">
                <span class="label_name">Kategoria</span>
                <div class="select-dropdown" style="width: 100%;">
                    <select name="category_name">
                        <option value="default" disabled selected>Wybierz kategorie:</option>
                        @foreach($categoryList as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->has('category_name'))
                    <span class="error validator">{{ $errors->first('category_name') }}</span>
                @endif
            </label>

            <label for="image_file">
                <span class="label_name">Zdjęcie</span>
                <input type="file" id="image_file" class="input_file" name="image_file" />
                @if($errors->has('image_file'))
                    <span class="error validator">{{ $errors->first('image_file') }}</span>
                @endif
            </label>

            <input type="submit" class="primary submit login_submit" value="Dodaj wpis" />
        </form>        
    </div>
@endsection
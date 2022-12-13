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
        <h2 class="form_name">Pole edycji artykułu</h2>
        <form action="{{ route('admin.dashboard.store.edit', ['article' => $articleData->id]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PATCH')

            <label for="title">
                <span class="label_name">Tytuł</span>
                <input type="text" id="title" class="input" name="title" value="{{ $articleData->title }}" />
            </label>

            <label for="excerpt">
                <span class="label_name">Streszczenie</span>
                <textarea type="text" id="excerpt" name="excerpt" class="textarea">{{ $articleData->excerpt }}</textarea>
            </label>

            <label for="description">
                <span class="label_name">Treść</span>
                <textarea type="text" id="description" name="description" class="textarea description">{{ $articleData->description }}</textarea>
            </label>

            <label for="image_file">
                <span class="label_name">Zdjęcie</span>
                <input type="file" id="image_file" class="input_file" name="image_file" />
            </label>

            <input type="submit" class="primary submit login_submit" value="Edytuj artykuł" />
        </form>

    </div>
@endsection
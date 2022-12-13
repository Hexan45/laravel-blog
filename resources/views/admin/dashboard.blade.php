@extends('layouts.index')

@section('meta')
    <meta charset="utf-8">
    <meta name="description" content="This is a desc">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pagination.css') }}" />

    <link rel="canonical" href="http://localhost:8000/" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Panel Administratora</title>
@endsection

@section('content')
    <div class="inner_dashboard">
        @if(session()->has('status'))
            <x-notification-template
                :notificationType="session('status')['type']"
                :notificationHeader="session('status')['header']"
                :notificationMessage="session('status')['message']"
            />
        @endif
        <h2 class="action_name">Zarządzanie artykułami</h2>
        <div class="dashboard_content">
            <table>
                <tr class="header_table">
                    <th colspan="1">ID</th>
                    <th colspan="3">Tytuł</th>
                    <th colspan="1">Autor</th>
                    <th>Operacje</th>
                </tr>
                @foreach($articles as $article)
                    <x-post-item 
                    :articleID="$article->id"
                    :articleTitle="$article->title"
                    :articleAuthorNickname="$article->author_id"
                    />
                @endforeach
            </table>
            {{ $articles->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
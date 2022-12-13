@extends('layouts/index')

@section('meta')
    <meta charset="utf-8">
    <meta name="description" content="This is a desc">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/default.css') }}" />

    <link rel="canonical" href="http://localhost:8000/" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="{{ asset('js/dropdown.js') }}"></script>

    <title>Blog.pl</title>
@endsection

@section('navbar')
    <header class="navigation_header">
        <div class="content_container">

            <div class="logotype_container">
                <img src="{{ asset('images/log-blog.png') }}" alt="Logotype with dark blue background and white B letter" class="logotype" width="30" height="30" />
                <a href="{{ route('default.home') }}">
                    <h1 class="blog_name">NAZWA BLOGA</h1>
                </a>
            </div>

            <nav class="navigation_bar">
                <ul>

                    <a href="{{ route('default.home') }}">
                        <li class="navigation_item link">
                            Strona główna
                        </li>
                    </a>
                    
                    <a href="{{ route('default.articles') }}">
                        <li class="navigation_item link">
                            Artykuły
                        </li>
                    </a>

                    <a href="{{ route('default.about') }}">
                        <li class="navigation_item link">
                            O mnie
                        </li>
                    </a>

                    <a href="{{ route('default.contact') }}">
                        <li class="navigation_item link">
                            Kontakt
                        </li>
                    </a>

                </ul>
            </nav>

            <div class="action_content">

                @unless(Auth::check())
                    <a href="{{ route('user.login') }}" class="primary submit">Zaloguj się</a>
                @else
                    <x-user-settings />
                @endunless

            </div>

        </div>
    </header>
@endsection

@section('content')
    <div class="inner_container">

        <div class="back_link">
            <a href="{{ URL::previous() }}" class="link" style="color:#487beb;">Poprzednia strona</a>
        </div>

        <article class="article_main_content">

            <header class="article_header">
                <div class="article_header_info">
                    <time datetime="2021-03-02">
                        <span>Dodano: </span>
                        <span class="article_date">{{ get_only_date($articleData->article_created_at) }}</span>
                        <span class="article_divider">/</span>
                        <a href="#" style="color: #487beb;" class="link category_link">#{{ $articleCategory->name }}</a>
                    </time>
                </div>
                <h2 class="article_title">{{ $articleData->title }}</h2>
            </header>

            <div class="article_author">
                <img src="{{ asset('storage/' . $articleAuthor->image_path) }}" alt="Image author" width="60" height="60" class="author_image" />
                <span>{{ $articleAuthor->nickname }}</span>
            </div>

            <figure class="image_content">
                <img src="{{ asset('storage/' . $articleData->image_path) }}" alt="Article image preview" style="width: 100%;" class="article_image" />
            </figure>

            <section class="post_full_content">

                {!! $articleData->description !!}

            </section>

        </article>
    </div>
@endsection

@section('footer')
    <footer class="footer_content">

        <img src="{{ asset('images/log-blog.png') }}" class="footer_image" alt="blog logotype" width="40" height="40" />

        <div class="footer_group">
            <h5 class="group_name">O blogu</h5>
            <p class="group_body">
                Donec pharetra auctor diam et pulvinar. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis sit amet nunc et ante laoreet congue eu non lacus. In orci ligula, convallis vitae luctus sed, bibendum rutrum nibh.
            </p>
        </div>

        <div class="footer_group">
            <h5 class="group_name">Mapa Strony</h5>
            <div class="group_content">
                <ul>
                    <li>
                        <a href="#" class="link footer_link">Strona główna</a>
                    </li>
                    <li>
                        <a href="#" class="link footer_link">Artykuły</a>
                    </li>
                    <li>
                        <a href="#" class="link footer_link">O mnie</a>
                    </li>
                    <li>
                        <a href="#" class="link footer_link">Kontakt</a>
                    </li>
                    <li>
                        <a href="#" class="link footer_link">Logowanie</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer_group">
            <h5 class="group_name">Ostatnio na blogu</h5>
            <div class="group_content">
                <ul>
                    <li>
                        <a href="#" class="link footer_link">This is a default content title for this article</a>
                    </li>
                    <li>
                        <a href="#" class="link footer_link">This is a default content title for this article</a>
                    </li>
                    <li>
                        <a href="#" class="link footer_link">This is a default content title for this article</a>
                    </li>
                </ul>
            </div>
        </div>

    </footer>

    <small class="copy_right">
        &copy; Copyright 2022, Name of Blog/Corp. etc.
    </small>
@endsection
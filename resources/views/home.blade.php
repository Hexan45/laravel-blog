@extends('layouts.index')

@section('meta')
    <meta charset="utf-8">
    <meta name="description" content="This is a desc">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />

    <link rel="canonical" href="http://localhost:8000/" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

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

            <div class="search_content">
                <a href="#" class="primary submit">Zaloguj się</a>
            </div>

        </div>
    </header>
@endsection

@section('content')
    <x-section-name :sectionName="$section" />
    <section class="new_articles grid_articles">

        @foreach($data as $article)
            <x-article-template
                :imagePath="$article->image_path"
                :imageAlternative="$article->image_alternate"
                :authorID="$article->author_id"
                :id="$article->id"
                :title="$article->title"
                :excerpt="$article->excerpt"
                :articleCreatedAt="$article->article_created_at"
            />
        @endforeach

    </section>

    <aside class="aside_info">

        <h4 class="widget_name">O mnie</h4>
        <div class="aside_widget">
            <figcaption class="category_content">
                <img src="{{ asset('images/author.jpg') }}" alt="Sitting man he welcome to camera" class="category_photo" width="60" height="60" />
                <h4 class="category_name">Bob Budowniczy</h4>
            </figcaption>
            <p class="widget_description">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ut ante ac diam ultricies fringilla rhoncus ut arcu. Maecenas id massa tincidunt, laoreet odio vitae, efficitur lectus.
            </p>
        </div>

        <h4 class="widget_name">Skontaktuj się ze mną</h4>
        <div class="aside_widget">
            <p class="widget_description">
                Kontakt to podstawa, jeśli masz jakieś pytania, zapraszam od formularza kontaktu :)
            </p>
        </div>

    </aside>

    <div style="clear:both;"></div>
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
                        <a href="{{ route('default.home') }}" class="link footer_link">Strona główna</a>
                    </li>
                    <li>
                        <a href="{{ route('default.articles') }}" class="link footer_link">Artykuły</a>
                    </li>
                    <li>
                        <a href="{{ route('default.about') }}" class="link footer_link">O mnie</a>
                    </li>
                    <li>
                        <a href="{{ route('default.contact') }}" class="link footer_link">Kontakt</a>
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
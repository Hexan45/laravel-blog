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
                    <div class="content" onclick="toggleDrop(this)">
                        <span class="user_nickname">
                            <span style="font-weight: 500;">Witaj,</span> 
                            {{ Auth::user()->nickname }}
                        </span>
                        <img src="{{ asset('storage/' . Auth::user()->image_path) }}" alt="Logged user avatar" style="width: 35px; height: 35px;" class="user_image show_drop" />

                        <div class="dropdown">
                            <ul>
                                <li class="dropdown-account">Konto {{ Auth::user()->role }}a</li>
                                <a href="#">
                                    <li class="dropdown-item">Pokaż profil</li>
                                </a>
                                <a href="#">
                                    <li class="dropdown-item">Ustawienia</li>
                                </a>
                                <a href="{{ route('user.logout') }}">
                                    <li class="lined dropdown-item">Wyloguj się</li>
                                </a>
                            </ul>
                        </div>
                    </div>
                @endunless

            </div>

        </div>
    </header>
@endsection

@section('content')
    <div class="error_content">
        <div class="_404_content">
            <h2>Ups... Dlaczego tutaj nic nie ma?</h2>
            <p>Przyjżyjmy się temu, dlaczego na tej stronie nie ma żadnej treści, a powodów może być kilka:</p>
            <ul>
                <li>Adres wprowadzony w przeglądarce nie istnieje w tej witrynie i napotkałeś/aś ten błąd</li>
                <li>Kliknąłeś/aś link otwierający artykuł/profil etc. który już nie istnieje w tej witrynie</li>
                <li>Wprowadziłeś/aś prawidłowy adres, jednak serwer strony nie odnalazł pasującego pliku z różnych powodów i znalazłeś/aś się tutaj</li>
            </ul>
            <p>Zachęcam Cię do odwiedzenia bezpiecznego miejsca, trochę tutaj pusto...</p>
            <div class="back_link">
                <a href="{{ route('default.home') }}" class="link" style="color:#487beb;">Powrót do strony głównej</a>
            </div>
        </div>
        <div class="_404_image">
            <img src="{{ asset('images/404-not-found.svg') }}" alt="404 numbers with sitting woman in 0 and flying ufo in background" style="width: 50%" />
        </div>
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
@extends('layouts.index')

@section('meta')
    <meta charset="utf-8">
    <meta name="description" content="This is a desc">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/forms.css') }}" />
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

        @if(session()->has('status'))
            <x-notification-template
                :notificationType="session('status')['type']"
                :notificationHeader="session('status')['header']"
                :notificationMessage="session('status')['message']"
            />
        @endif

        <div class="back_link">
            <a href="{{ URL::previous() }}" class="link" style="color:#487beb;">Poprzednia strona</a>
        </div>

        <div class="form_container">
            <h2 class="form_name">Formularz rejestracji</h2>
            <form action="{{ route('user.register.validate') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <label for="nickname">
                    <span class="label_name">Nickname</span>
                    <input type="text" id="nickname" class="input" name="nickname" placeholder="Podaj nick" value="{{ old('nickname') }}" />
                    @if($errors->has('nickname'))
                        <span class="error validator">{{ $errors->first('nickname') }}</span>
                    @endif
                </label>

                <label for="email">
                    <span class="label_name">Email</span>
                    <input type="email" id="email" class="input" name="email" placeholder="Podaj swój email" value="{{ old('email') }}" />
                    @if($errors->has('email'))
                        <span class="error validator">{{ $errors->first('email') }}</span>
                    @endif
                </label>

                <label for="repeat_email">
                    <span class="label_name">Powtórz email</span>
                    <input type="email" id="repeat_email" class="input" name="email_confirmation" placeholder="Powtórz swój email" value="{{ old('email_confirmation') }}" />
                    @if($errors->has('email_confirmation'))
                        <span class="error validator">{{ $errors->first('email_confirmation') }}</span>
                    @endif
                </label>

                <label for="password">
                    <span class="label_name">Hasło</span>
                    <input type="password" id="password" class="input" name="password" placeholder="Podaj hasło" value="{{ old('password') }}" />
                    @if($errors->has('password'))
                        <span class="error validator">{{ $errors->first('password') }}</span>
                    @endif
                </label>

                <label for="repeat_password">
                    <span class="label_name">Powtórz hasło</span>
                    <input type="password" id="repeat_password" class="input" name="password_confirmation" placeholder="Powtórz hasło" value="{{ old('password_confirmation') }}" />
                    @if($errors->has('password_confirmation'))
                        <span class="error validator">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                </label>

                <label for="image_file">
                    <span class="label_name">Wybierz plik</span>
                    <input type="file" id="image_file" class="input_file" name="image_file" />
                    @if($errors->has('image_file'))
                        <span class="error validator">{{ $errors->first('image_file') }}</span>
                    @endif
                </label>

                <input type="submit" class="primary submit login_submit" value="Utwórz konto" />
            </form>
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
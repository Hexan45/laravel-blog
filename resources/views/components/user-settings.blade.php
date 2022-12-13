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
            @if(Auth::user()->can('delete-post') && Auth::user()->can('edit-post'))
                <a href="{{ route('admin.dashboard') }}">
                    <li class="dropdown-item">Zarządzanie</li>
                </a>
            @endif
            @if(Auth::user()->can('create-post'))
                <a href="{{ route('admin.dashboard.create') }}">
                    <li class="dropdown-item">Dodaj wpis</li>
                </a>
            @endif
            <a href="{{ route('user.logout') }}">
                <li class="lined dropdown-item">Wyloguj się</li>
            </a>
        </ul>
    </div>
</div>
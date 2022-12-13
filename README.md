# laravel-blog project

Prosty projekt bloga oparty na frameworku Laravel 9, aktualna wersja wspiera front-end wyłącznie w wersjach desktopowych.

## Funkcjonalności

- System uwierzytelniania wraz z rolami i autoryzacją ( istniejące role to Użytkownik oraz Administrator )
- System rejestracji wraz z wysyłanym linkiem potwierdzającym na podany adres email
- Panel administratora z możliwością usuwania, edytowania oraz tworzenia artykułów

## Instalacja

```sh
git clone https://github.com/Hexan45/laravel-blog.git
composer install
Nazwę pliku .env.example należy zmienić na .env
php artisan key:generate
```

Skonfiguruj plik `.env` gdzie: `APP_NAME` to nazwa twojego bloga, `APP_TIMEZONE` (trzeba dodać) to strefa czasowa preferowana przez Ciebie, `FILESYSTEM_DISK` (trzeba dodać) to miejsce zapisywania plików (szczegółowe informacje na ten temat znajdziesz w katalogu `config/filesystems.php`)

**Uwaga! z racji, że projekt korzysta z bazy danych trzeba musisz skonfigurować swoje połączenie w pliku `.env` wraz ze sterownikiem email, który wysyła linki aktywujące konto po procesie rejestracji**

Po poprawnej konfiguracji wykonaj poniższe komendy, aby wykonać migrację oraz stworzyć link symboliczny pomiędzy lokalnym katalogiem przechowywania oraz publicznym katalogiem dostępnym z widoku przeglądarki. Wykonaj następujące komendy:
```sh
php artisan migrate
php artisan storage:link
```

# Działaj!
Jeśli wszystko zostało odpowiednio skonfigurowane, wystarczy wywołać komendę `php artisan serve` i gotowe! Twój projekt znajduje się pod adresem `http://localhost:8000/`
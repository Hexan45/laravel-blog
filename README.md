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
Należy również skonfigurować połączenie z bazą danych w celu poprawnego działania

Po przejściu wszystkich kroków możesz przystąpić do zainicjowania tabel w swojej bazie danych za pomocą komendy `php artisan migrate`
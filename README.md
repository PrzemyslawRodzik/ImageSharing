# ImageSharing
Website for image sharing between users

Pierwsza konfiguracja aplikacji:
1. W phpmyadmin utworzyć bazę danych o nazwie: imageshare

2.W folderze z aplikacją uruchomić wiersz poleceń i wpisać następujące komendy:

composer install --no-scripts

composer update

php artisan migrate

php artisan storage:link

php artisan serve



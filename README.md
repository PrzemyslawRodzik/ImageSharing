# ImageSharing
Website for image sharing between users

Pierwsze kroki w celu skonfigurowania aplikacji:

1. W phpmyadmin utworzyć bazę danych o nazwie: imageshare

2. W folderze z projektem w wierszu poleceń wprowadzić następujące polecenia:

composer install --no-scripts

composer update

php artisan migrate

php artisan serve

Po wprowadzeniu komendy "php artisan migrate" oprócz stworzenia tabel do bazy danych zostanie dodanych 5 losowych użytkowników: ( hasło: 'zxczxc') + konto administratora o danych: login: admin@admin.com, haslo: 'zxczxc'.

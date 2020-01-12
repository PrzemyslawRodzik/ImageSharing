# ImageSharing
Website for image sharing between users

Pierwsze kroki w celu skonfigurowania aplikacji:

1. W phpmyadmin utworzyć bazę danych o nazwie: imageshare

2. W folderze z projektem w wierszu poleceń wprowadzić następujące polecenia:

1.composer install --no-scripts

2.composer update

3.php artisan migrate

4.php artisan serve

Po wprowadzeniu komendy "php artisan migrate" oprócz stworzenia tabel do bazy danych zostanie dodanych 5 losowych użytkowników: ( hasło: 'zxczxc') + konto administratora o danych: login: admin@admin.com, haslo: 'zxczxc'.

W przypadku, gdy chcemy wygenerować losowych użytkowników i ich losowe posty za pośrednictwem komendy 'php artisan db:seed' należy 'wyłaczyć serwer', następnie  podmienić plik image.php znajdujący się w ...\ImageSharing\vendor\fzaninotto\faker\src\Faker\Provider Następnie wystarczy ponownie wpisać komendę nr 4.
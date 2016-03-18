# Symphony 


Webseite: https://symphony.com

## Konfiguration VM 

Unter /home/student/symphony/web ist das Verzeichnis, welches unter http://symphony ausgeliefert wird. 

PHP Sqlite installieren: 

```
sudo apt-get install php5-sqlite
```



## Installation Symphony 

Folgende Anleitung benutzt: https://symfony.com/doc/current/book/installation.html

### Installation des Symfony Command

```
$ sudo curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony
$ sudo chmod a+x /usr/local/bin/symfony
```

### Anlegen des ersten Symphony Projektes 

Im Verzeichnis /home/student/symphony/projects folgenden Befehl ausführen: 

```
symfony new notes_project
```

Ausgabe: 

```
 Downloading Symfony...

    4.97 MB/4.97 MB ▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓  100%

 Preparing project...

 ✔  Symfony 3.0.3 was successfully installed. Now you can:

    * Change your current directory to /home/student/symphony/projects/notes_project

    * Configure your application in app/config/parameters.yml file.

    * Run your application:
        1. Execute the php bin/console server:run command.
        2. Browse to the http://localhost:8000 URL.

    * Read the documentation at http://symfony.com/doc
```

Anlegen der Postgres-Datenbank **symfony_notes_project** und die Konfiguration in app/config/parameters.yml anpassen:

```
# This file is auto-generated during the composer install
parameters:
    database_host: 127.0.0.1
    database_port: 5432
    database_name: symfony_notes_project
    database_user: postgres
    database_password: postgres
    mailer_transport: smtp
    mailer_host: 127.0.0.1
    mailer_user: null
    mailer_password: null
    secret: a42a6cff6d9a238a9559ee6fd682a36ef6656b89
``` 

### Ausführen der Symfony Applikation 

Starten des Servers

```
student@ubuntu:~/symphony/projects/notes_project$ php bin/console server:run
```

Ausgabe: 

```
[OK] Server running on http://127.0.0.1:8000         
```

Aufrufen der Webseite gibt die Startseite von Symphony aus. 


### Konfiguration der Webseite für den Apache Webserver 

Doku Link: https://symfony.com/doc/current/cookbook/configuration/web_server_configuration.html

Virtual Host Config /etc/apache2/sites-available/symfony-notes-project.conf

```
<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        ServerName typo3flow
        DocumentRoot /home/student/typo3flow/tutorial/Web

        <Directory /home/student/typo3flow/tutorial/Web>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride all
                Require all granted
        </Directory>
        ErrorLog ${APACHE_LOG_DIR}/typo3flow-error.log
        CustomLog ${APACHE_LOG_DIR}/typo3flow-access.log combined
</VirtualHost>
```

Berechtigungen anpassen: 

```
sudo chown -R www-data:www-data notes_project/
```

Konfiguration testen unter http://symfonynotes/config.php

Gemeldetes Problem: 
``` 
Set the "date.timezone" setting in php.ini* (like Europe/Paris).
```

Datei /etc/php5/apache2/phpini.php, Zeile 879

```
date.timezone = Europe/Zurich
```


# Tutorial durchspielen 

Link: https://symfony.com/

[Dokumentation direkt im Readme File des Notes Projects](projects/notes_project/README.md)




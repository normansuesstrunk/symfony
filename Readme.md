# Symphony

Webseite: https://symphony.com


## Installation Symphony

### Nötige Pakete installieren

```
sudo apt-get install php5-sqlite php5-pgsql
```

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
This file is auto-generated during the composer install
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
student@ubuntu:~/symphony/projects/notes_project$ php bin/console server:run 127.0.0.1:8001
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

Danach ist die Webseite unter http://symfonynotes/ erreichbar

Damit Ich die Änderungen im Apache jeweils sehe muss der Cache geleert werden: 

```
$ php bin/console cache:clear --env=prod --no-debug
```

## Entwicklungsumgebung

* PHP mit Eclipse Plugin 
* Eclipse Plugin für Twig: http://twig.dubture.com/installation/

# Tutorial durchspielen
Link: https://symfony.com/
[Dokumentation direkt im Readme File des Notes Projects](projects/notes_project/README.md)

# Symfony Cookbook

https://symfony.com/doc/current/cookbook/index.html

## Managing Projects in Git

https://symfony.com/doc/current/cookbook/workflow/new_project_git.html


Wenn ein Projekt ausgecheckt wird, müssen erst die Vendor-Libraries mit Composer installiert werden:

```
composer install
```

## Symfony und AngularJS

[Dokumentation AngularJS](AngularJSTutorial.md)

# Herunterladen & Installieren von MyRapport 

Github URL: https://github.com/nitrobar/MyRapport.git

Projekt klonen: 

```
git clone https://github.com/nitrobar/MyRapport.git
```

Im Verzeichniss web/my_project composer ausführen: 

```
composer install
``` 

Da können dann auch die Datenbank-Parameter angegeben werden. 

Mit Doctrine die Tabellen erzeugen: 


```
$ php bin/console doctrine:schema:update --force
```


# Eclipse Notizen 

## Probleme mit DLTK (Dynamic Language Toolkit)

Löschen des Indexes des DLTK falls er korrupt ist: 

```
rm -rf ~/workspace/.metadata/.plugins/org.eclipse.dltk.core.index.sql.h2/*
```

Increase heap size of eclipse, Editieren von php.ini:  

```
... 
-XX:MaxPermSize=512m
-Xms512m
-Xmx2024m
```

# Deployen eines Symfony Projektes auf einem frischen Ubuntu 16.06 Server 

##  Installation Software auf Ubuntu Server 

###  vim & git 

sudo apt-get install -y vim git 


###  LAMP Installation(PHP5, Apache, MySQL)

* Apache 
* PHP 
 
Install Apache: 
```
sudo apt-get install apache2
```
Enable and start Apache: 
``` 
systemctl enable apache2
systemctl start apache2
systemctl status apache2
```

Enable apache rewrite modul: 

```
sudo a2enmod rewrite
sudo service apache2 restart 
```


### Install PHP 

```
sudo apt-get install -y php libapache2-mod-php php-pgsql php-xml
```

###  Install Postgres 

```
sudo apt-get -y install postgresql 
```

Postgres Password setzen

```
sudo -u postgres psql -U postgres -d postgres -c "alter user postgres with password 'hg76tz';"
```

### Installation MySQL 

```
sudo apt-get install mysql-server php-mysql
```

Port: 3306

### Password

Password for root user: hg76tz


### Installation Composer 

Nötige Tools für Composer installieren: 
```
sudo apt-get install -y curl php-cli git unzip
```

Composer installieren: 

```
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
```

Permissions fixen (https://github.com/thomaszbz/native-dockerfiles-typo3/issues/19)

```
sudo chown -R l-admin /home/l-admin/.composer
```

### Install NodeJS

```
curl -sL https://deb.nodesource.com/setup_4.x | sudo -E bash -
sudo apt-get install -y nodejs
``` 

### Install less 

```
sudo npm install -g npm  (to update npm)
sudo npm install -g less less-plugin-clean-css
```

## Deployen eines Symfony Projektes

Beispiel Projekt Stagebuilder: https://github.com/sloepfe/stagebuilder.git

Verzeichnis für Projekt anlegen:
```
sudo mkdir -p /var/www/stagebuilder
```

Berechtigung für normalen Unix-Benutzer (hier l-admin) setzen: 
```
sudo chown l-admin:l-admin /var/www/stagebuilder
```

Als Benutzer l-admin das Projekt aus dem Git auschecken:  
```
cd /var/www
git clone https://github.com/sloepfe/stagebuilder.git stagebuilder
``` 

Im Verzeichnis /var/www/stagebuilder/stagebuilder composer ausführen: 

```
composer install
```
Beim Ausführen des Composer Install werden auch gleich die Datenbank-Parameter angegeben und in das config-file geschrieben. 


Datenbank mittels der Console anlegen: 

```
php bin/console doctrine:database:create
```

Schema updaten: 
```
php bin/console doctrine:schema:update --force
```

Requirements prüfen: 

```
php bin/symfony_requirements
```

### Korrekte File Permissions setzen

acl installieren: 

```
sudo apt-get install -y acl 
``` 

Cache leeren: 

```
l-admin@VIRTSRVIKT04:/var/www/stagebuilder/stagebuilder$ php bin/console cache:clear --env=prod --no-debug
```

Permissions setzen (hier beschrieben: http://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup)

```
HTTPDUSER=`ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX var
```

### Apache Konfiguration  


In Datei /etc/apache2/sites-available/000-default.conf

```
<VirtualHost *:80>
    
   	DocumentRoot /var/www/html
    
    # Alias Stagebuilder
    Alias /stagebuilder/ /var/www/stagebuilder/stagbuilder/web/
    <Directory /var/www/stagebuilder/stagbuilder/web>
       AllowOverride None
        Order Allow,Deny
        Allow from All

        <IfModule mod_rewrite.c>
            Options -MultiViews
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteRule ^(.*)$ app.php [QSA,L]
        </IfModule>
    </Directory>
    
</VirtualHost>
```

Danach läuft die Applikation unter http://[host/ip]/myrapport/
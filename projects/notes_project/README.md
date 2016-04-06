Notes Project (notes_project)
===============================

A Symfony project created on March 18, 2016, 10:24 am.

# Anlegen der ersten Seite

Tutorial durchspielen von https://symfony.com/doc/current/book/page_creation.html

Lucky Number Controller implementiert

Aufrufen unter
* http://symfonynotes/app_dev.php/lucky/number
* http://127.0.0.1:8000/lucky/number

Als JSON:
* http://127.0.0.1:8000/api/lucky/number
* http://symfonynotes/app_dev.php/api/lucky/number


Alle Routen ausgeben:

```
php bin/console debug:route
```

```
 -------------------------- -------- -------- ------ -----------------------------------
  Name                       Method   Scheme   Host   Path                               
 -------------------------- -------- -------- ------ -----------------------------------
  _wdt                       ANY      ANY      ANY    /_wdt/{token}                      
  _profiler_home             ANY      ANY      ANY    /_profiler/                        
  _profiler_search           ANY      ANY      ANY    /_profiler/search                  
  _profiler_search_bar       ANY      ANY      ANY    /_profiler/search_bar              
  _profiler_info             ANY      ANY      ANY    /_profiler/info/{about}            
  _profiler_phpinfo          ANY      ANY      ANY    /_profiler/phpinfo                 
  _profiler_search_results   ANY      ANY      ANY    /_profiler/{token}/search/results  
  _profiler                  ANY      ANY      ANY    /_profiler/{token}                 
  _profiler_router           ANY      ANY      ANY    /_profiler/{token}/router          
  _profiler_exception        ANY      ANY      ANY    /_profiler/{token}/exception       
  _profiler_exception_css    ANY      ANY      ANY    /_profiler/{token}/exception.css   
  _twig_error_test           ANY      ANY      ANY    /_error/{code}.{_format}           
  homepage                   ANY      ANY      ANY    /                                  
  app_lucky_luckynumber      ANY      ANY      ANY    /lucky/number                      
  app_lucky_apiluckynumber   ANY      ANY      ANY    /api/lucky/number                  
 -------------------------- -------- -------- ------ -----------------------------------
 ```

### Dynamic Routing Pattern

Implementiert und Aufrufbar unter http://127.0.0.1:8000/api/lucky/numberCount/5, generiert dann 5 Zufallszahlen

### Templating

Symfony benutzt Twig als Template Engine


# Configuration

Ausgeben aller Framework Bundles configs:

```
$ php bin/console config:dump-reference framework
```


## Datenbank

https://symfony.com/doc/current/book/doctrine.html

Install php postgres support:
```
sudo apt-get install php5-pgsql
```
Anpassen config file  app/config/config.yml für postgres datenbank:

```
# Doctrine Configuration
doctrine:
    dbal:
        driver:   pdo_pgsql
        ...
```

Falls der integrierte Server läuft, muss dieser gestoppt und wieder gestartet werden damit die Postgres-Verbindung dann auch läuft.

Löschen / Anlegen der Datenbank:

```
$ php bin/console doctrine:database:drop --force
$ php bin/console doctrine:database:create
```

Gesteuertes Anlegen von Entities:

```
$ php bin/console doctrine:generate:entity
```

Erzeugen der Tabellen wenn die Entities (PHP-Klassen) erzeugt wurden:

```
$ php bin/console doctrine:schema:update --force
```

Controller AppBundle\Controller\NoteController angelegt, welcher unter http://127.0.0.1:8000/note/create aufgerufen werden kann.

# AngularJS als Frontend Framework

Für das Management von Abhängigkeiten der Frontend-Bibliotheken (AngularJS, Bootstrap etc) wird bower verwendet.

Bower installieren:

```
sudo npm install -g bower
```

Als Ausgabeverzeichnis von Bower web/assets/vendor/ konfigurieren -> Anlegen der Datei /home/[user]/git/symfony/projects/notes-project/.bowerrc mit Inhalt:

```
{
    "directory": "web/assets/vendor/"
}
```

Datei /home/[user]/git/symfony/projects/notes-project/bower.json anlegen, welche die Abhängigkeiten definiert:

```
{
  "name": "notes_project",
  "ignore": [
    "**/.*",
    "node_modules",
    "bower_components",
    "web/assets/vendor/",
    "test",
    "tests"
  ],
  "dependencies": {
    "angular": "1.4.x",
    "angular-mocks": "1.4.x",
    "jquery": "~2.1.1",
    "bootstrap": "~3.1.1"
  }
}
```

Abhängigkeiten installieren:

```
bower install
```

Ein Template angelegt für eine A ngular-Seite, erreichbar unter **http://127.0.0.1:8001/angular**

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
## Datenbank

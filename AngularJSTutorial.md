# AngularJS Tutorial


Tutorial durchspielen: https://docs.angularjs.org/tutorial


Tutorial Projekt klonen:

```
/home/norman/git$ git clone --depth=14 https://github.com/angular/angular-phonecat.git
```

Nodes.js und npm installieren:

```
sudo apt-get install nodejs-legacy npm
```

App installieren:

```
npm install
```
Aus doku:

```
Running npm install will also automatically use bower to download the Angular framework into the app/bower_components directory.
```

Install the helper tools: 

```
sudo npm install -g bower
```

## Running Development Webserver

nptm start


## Zusammenspiel Twig / AngularJS

Problem & Solution: http://blog.shaharia.com/twig-and-angularjs-curly-braces-conflict-solution/

Anlegen der Datei web/js/notes.js mit folgendem Inhalt: 

```
var app = angular.module('notesApp', []);

app.config(function($interpolateProvider){
  $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});
```

und diese Datei einbinden in das Template (base.html.twig) und Namen für die App vergeben:  

```
<!DOCTYPE html>
<html ng-app="notesApp">
...
<!-- include js for angular app -->
<script 
	src=	"{{ asset('js/notes.js') }}"></script>
```

## Ajax in Angular-JS

http://www.java2blog.com/2016/03/angularjs-ajax-example-using-http.html



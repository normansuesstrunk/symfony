/**
 * 
 */


var app = angular.module('notesApp', []);

app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

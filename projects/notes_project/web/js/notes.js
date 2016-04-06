/**
 * configure tags for angular js because 
 * the default ones collide with the twig tags 
 */
var app = angular.module('notesApp', []);
app.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
});

// Angular Controllers 

app.controller('NotesListController', function($scope, $http) {
   
	
	var url = "notes.json"; 
	
	
	var notesList = this;
   
	// global lists with notes
	notesList.notes = [
      {
    	  title:'learn angular', 
    	  description:'Begin to learn Angular',
    	  done:true
      },
      {
    	  title:'build an angular app',
    	  description:'Build a simple Angular app with symfony',
    	  done:false
      }
      ];
 
	notesList.addNote = function() {
      notesList.notes.push(
    		  {
    			  title:	notesList.noteTitle, // add text from inputfield
    			  done:		false
    		  });
      notesList.noteTitle = ''; // reset the input field
	};
   
   /**
    * counts all notes that are 
    * not done yet
    */
	notesList.remaining = function() {
      var count = 0;
      angular.forEach(notesList.notes, function(note) {
    	  count += note.done ? 0 : 1;
      });
      return count;
	};
 
	/**
	 * removes all notes that are done 
	 * from the list
	 */
	notesList.archive = function() {
	   	// save list in temporary variable
    	var oldNotes = notesList.notes;
    	// clear the list with the notes
    	notesList.notes = [];
    	
    	// only add the notes wich are not archived to the list
    	angular.forEach(oldNotes, function(note) {
    		if (!note.done) notesList.notes.push(note);
    	});
    };
});

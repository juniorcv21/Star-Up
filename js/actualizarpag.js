$(document).ready(function() {
      var refreshId =  setInterval( function(){
    $('#chats').load(document.URL +  ' #chats>');
    //actualizar el div 1
    $('#usuarios').load(document.URL +  ' #usuarios>');
    $('#registrouser').load(document.URL +  ' #registrouser>');
   }, 1000 );
});
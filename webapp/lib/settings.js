function addHandlers() {
	$("#updateEmailButton").on( "click", function(){
		$.get("updateEmail.php?pID=1&email="+$("email").val(),function(d){});
		});
		
		}




$(document).on('pageinit', function() {
	
	addHandlers();



});

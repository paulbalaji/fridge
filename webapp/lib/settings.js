function addHandlers() {
	$("#updateEmailButton").click(  function(){
		alert("hi..");
		$.get("updateEmail.php?pID=1&email="+$("email").val(),function(d){});
		});
		
		}




$(document).on('pageinit', function() {
	alert("yo...");
	addHandlers();



});

var updateEmailClick = function() {

		$.get("updateEmail.php?pID=1&email="+$("emailF").val(),function(d){});
		
}
function addHandlers() {
	$(document).on( "click", "#updateEmailButton", updateEmailClick );
		
}




$(document).on('pageinit', function() {
	alert("yo...");
	addHandlers();



});

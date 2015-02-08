var updateEmailClick = function() {
	alert("Updated Email");
		$.get("updateEmail.php?pID=1&email="+$("#email").val(),function(d){});
		
}
function addHandlers() {
	$(document).on( "click", "#updateEmailButton", updateEmailClick );
		
}




$(document).on('pageinit', function() {

	addHandlers();



});

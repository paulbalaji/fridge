

var onAddCustom = function() {
	
	 $.get("addCustomItem.php?pID="+$("#pID").val()+"&customItemName=" + $("#customItemName").val(), function(data) {});
	 $("#customItemName").val("");
}


var updateEmailClick = function() {
		alert("Email Updated");
		$.get("updateEmail.php?pID=1&email="+$("#email").val(),function(d){});
		
		
};


var onSwipeRight = function () {
	
        var listElem = $(this);

        listElem.animate({
            opacity: '-=0.6',
            marginLeft: '+=450',

        }, 350, function() {
            $(this).hide();
            // Animation complete.
        });

        var itemID = $(this).attr('id')
        if (itemID == "-1") {
            $.get("deleteListItem.php?pID=1&itemID=" + $(this).attr('id') + "&customItemName=" + $(this).html(), function(data) {});
        } else {
            $.get("deleteListItem.php?pID=1&itemID=" + $(this).attr('id'), function(data) {});
        }




    	
	
}

function update() { 

  	$.get('getList.php', function (data) {

        $("#list").html(data);
		
    
}
);	
}

function addHandlers() {

	$(document).on( "click", "#addCustomButton", onAddCustom );
	

	$(document).on( "swiperight", "#list ul li", onSwipeRight );
	$(document).on( "click", "#updateEmailButton", updateEmailClick );
		
		$('#customItemName').bind('keypress', function(e) {
 var code = e.keyCode || e.which;
 if(code == 13) { //Enter keycode
   onAddCustom()
 }
});

}


$(document).on('pagecreate', function() {
	addHandlers();

	update();
  
  setInterval(update, 1500);
});

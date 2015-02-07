

var onAddCustom = function() {
	
	 $.get("addCustomItem.php?pID="+$("#pID").val()+"&customItemName=" + $("#customItemName").val(), function(data) {});
	 $("#customItemName").val("");
}



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
function init() {
  

	

	


}

function update() { 
  	$.get('getList.php', function (data) {

        $("#list").html(data);
		
    
}
);	
}

function addHandlers() {
	$(document).on( "swiperight", "#list ul li", onSwipeRight );
		$(document).on( "click", "#addCustomButton", onAddCustom );

}

$(document).on('pageinit', function() {
	
	addHandlers();

	update();
  
  setInterval(update, 1500);



});
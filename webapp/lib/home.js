
function init() {
$("#list ul li").on("swiperight",function(){
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
				 	 $.get( "deleteListItem.php?pID=1&itemID=" + $(this).attr('id')+"&customItemName=" + $(this).html(), function( data ) {});
			 } else {
				 $.get( "deleteListItem.php?pID=1&itemID=" + $(this).attr('id'), function( data ) {});
			 }
         
            
                
             
});
}

	$(document).on('pageinit', function() {
          
      

              
      
         	init();
 
          
		  setInterval(function(){
			$.get('getList.php', function(data) {
        $("#list").html(data);
		init();
});
		}, 500);
		  
      });
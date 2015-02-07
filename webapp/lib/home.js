 function doPoll(){
        $.get('getList.php', function(data) {
        $("#list").html(data);
        
        setTimeout(doPoll,500);
    });
}      
	$(function() {
          
         
              //doPoll();
      
         $("#list ul li").on("swiperight",function(){
            var listElem = $(this);
			
			listElem.animate({
    opacity: '-=0.6',
    marginLeft: '+=450',
   
  }, 350, function() {
	   $(this).hide();
    // Animation complete.
  });

             
               $.get( "deleteListItem.php?pID=1&itemID=" + $(this).attr('id'), function( data ) {
 
                   
                 
});
            
                
             
    });
 
          
      });
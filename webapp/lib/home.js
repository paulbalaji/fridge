
	$(function() {
          
         
          function doPoll(){
        $.get('getList.php', function(data) {
        $("#list").html(data);
        
        setTimeout(doPoll,<?php echo $pollFrequency; ?>);
    });
}           doPoll();
      
         $("#list ul li").on("swiperight",function(){
            var listElem = $(this);
 $(this).hide();
             
               $.get( "deleteListItem.php?pID=1&itemID=" + $(this).attr('id'), function( data ) {
  alert("Load done...");
                   listElem.hide();
                 
});
            
                
             
    });
 
          
      });
<?php
include("includes/meta.php");
?>
<!DOCTYPE html>
<html>
<head>
    

    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    
    <link rel = "stylesheet" type="text/css" href="lib/universal.css" />    
    
    <script type="text/javascript">
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
             
               $.get( "deleteListItem.php?pID=<?php echo $pID; ?>&itemID=" + $(this).attr('id'), function( data ) {
  alert("Load done...");
                   listElem.hide();
                 
});
            
                
             
    });
 
          
      });
    </script>
    
</head>
<body>
<?php #echo $pID; ?>
<div data-role="page">
   
  <div data-role="header">
      
      <h1>Fridge App</h1>
  <div data-role="navbar">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="settings.php">Settings</a></li>
      <li><a href="changepID.php">Enter PI ID</a></li>
    </ul>
  </div>
</div>

  <div data-role="main" class="ui-content">
    <p>The List</p>
      <div id="list">
          <?php
                #include("getList.php");
            ?>
          <ul>
          
              
              
          </ul>
      </div>
  </div>

  <div data-role="footer">
    <h1>End of Page</h1>
  </div>
</div> 

</body>
</html>

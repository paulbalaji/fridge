<?php include( "addEmail.php"); ?>
<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

    <script src="lib/home.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/universal.css" />

 

</head>

<body>
    <?php #echo $pID; ?>
    <div data-role="page">

        <div data-role="header">

            <h1>Settings</h1>
            <div data-role="navbar">
                <ul>
                    <li><a href="index.php">Home</a>
                    </li>
                    <li><a href="settings.php">Settings</a>
                    </li>
                    <li><a href="changepID.php">Enter PI ID</a>
                    </li>
                </ul>
            </div>
        </div>
	
        
        <div data-role="main" class="ui-content">
            
            <table>
            <p>Email list to: </p></td>     
            <input type="text" id="email" value="<?php echo $emailID; ?>" placeholder="Email Address" /></td>
            <td><a href="#" id="addCustomButton" data-role="button" data-icon="plus" data-iconpos="notext"></a></td>
            </table>

        <div data-role="footer">
            <h1>End of Page</h1>
        </div>
    </div>

</body>

</html>

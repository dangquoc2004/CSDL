<?php
    session_start();
    require('connect.php');
    if(@$_SESSION["username"]) {
?>
<html>
    <head>
        <title>Home page</title>    
    </head>
    <?php
        include("header.php");
    ?>
    <body>
        <!-- <center><a href = "indexx.php">Home page</a> | <a href = "account.php">My account | <a href = "members.php">Members | <a href = "indexx.php?action=logout">Log out</a></center> -->
    </body>
</html>        
<?php
    if(@$_GET['action'] == "logout") {
        session_destroy();
        header("Location: login.php");
    }
    } else {
        echo "You must be logged in";
    }
?>
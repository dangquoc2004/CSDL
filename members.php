<?php
    session_start();
    require('connect.php');
    if(@$_SESSION["username"]) {
?>
<html>
    <head>
        <title>Home page</title>    
    </head>
    <?php include("header.php");
        echo "<center><h1>Members</h1>";
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
        $check = mysqli_query($conn, "SELECT * FROM users");
        $rows = mysqli_num_rows($check);

        while($row = mysqli_fetch_assoc($check)) {
            $id = $row['id'];
            echo "<a href = 'profile.php?id=$id'>".$row['username']."</a><br/>";
        }
        echo "</center>";
    ?>
    <body> 
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
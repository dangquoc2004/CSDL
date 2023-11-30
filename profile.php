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
        echo"<center>";
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
        if(@$_GET['id']) {
            $check = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_GET['id']."'");
            $rows = mysqli_num_rows($check);

            if(mysqli_num_rows($check) != 0) {
                while($row = mysqli_fetch_assoc($check)) {
                    echo "<h1>".$row['username']."</h1><br />";
                    echo "<b>Date registered: </b>".$row['date']."<br />";
                    echo "<b>Email: </b>".$row['email']."<br />";
                    echo "<b>Replies: </b>".$row['replies']."<br />";
                    echo "<b>Topic created: </b>".$row['topics']."<br />";
                    echo "<b>Score(scr): </b>".$row['score'];
                }
            } else {
                echo "ID not found";
            }
        } else {
            header("Location: indexx.php");
        }
    ?>
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
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
    <center>
    <?php
        $conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
        $check = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_SESSION['username']."'");
        $rows = mysqli_num_rows($check);

        while($row = mysqli_fetch_assoc($check)) {
            $username = $row['username'];
            $id = $row['id'];
            $email = $row['email'];
            $date = $row['date'];
            $replies = $row['replies'];
            $score = $row['score'];
            $topics = $row['topics'];
        }
    ?>
        Username: <?php echo $username;?> <br />
        ID: <?php echo $id;?><br />
        Email: <?php echo $email;?><br />
        Date registered: <?php echo $date;?><br />
        Replies: <?php echo $replies;?><br />
        Score(scr): <?php echo $score;?><br />
        Topics: <?php echo $topics;?><br />
    </center>
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
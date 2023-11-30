<html>
<head><title>Login with your account</title></head>
<body>
    <form action = "login.php" method = "POST">
        Username: <input type = "text" name = "username"><br />
        Password <input type = "password" name = "password"><br />
        <input type = "submit" value = "Login" name = "submit">
    </form>
</body>
</html>

<?php
session_start();
require('connect.php');
$conn = mysqli_connect($db_server, $db_user, $db_password, $db_name);
$username = @$_POST['username'];
$password = @$_POST['password'];

if(isset($_POST['submit'])) {
    if($username && $password) {
        $check = mysqli_query($conn, "SELECT * FROM users where username = '".$username."'");
        $rows = mysqli_num_rows($check);
        
        if(mysqli_num_rows($check) != 0) {
            while($row = mysqli_fetch_assoc($check)) {
                $db_username = $row['username'];
                $db_password = $row['password'];
            }

            if($username == $db_username && !(sha1($password) == $db_password)) {
                @$_SESSION["username"] = $username;
                header("Location: indexx.php");
            } else {
                echo "Your password is wrong";
            }
        } else {
            die("Could not found username");
        }
    } else {
        echo "Please fill in the blank";
    }
}

if (isset($_POST['submit'])) {
    $username = $_POST['username']; // Assuming you have a form field named 'username'
    $password = $_POST['password']; // Assuming you have a form field named 'password'

    if ($username && $password) {
        // Using prepared statement to avoid SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows != 0) {
            echo "Username found";
        } else {
            die("Could not find username");
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Please fill in the blanks";
    }
}
?>
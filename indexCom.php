<?php

    date_default_timezone_set('Europe/Copenhagen');
    include 'dbh.inc.php';
    include 'comments.inc.php';
?>


<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<title>Title of the document</title>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>

<body>

<?php
    echo "<form method = 'POST' action = '".getLogin($conn)."'>
        <input type = 'text' name = 'uid'>
        <input type = 'password' name = 'pwd'>
        <button type = 'submit' name = 'loginSubmit'>Login</button>
    </form>";
    echo "<form method = 'POST' action = '".userLogout($conn)."'>
        <button type = 'submit' name = 'logoutSubmit'>Logout</button>
    </form>";
?>  
<br><br>

<?php
echo "<form method = 'POST' action = '".setComments($conn)."'>
    <input type = 'hidden' name = 'uid' value = 'Anonymous'>
    <input type = 'hidden' name = 'date' value = '".date('Y-m-d H:i:s')."'>
    <textarea name = 'message'></textarea><br>
    <button type = 'submit' name = 'commentSubmit'>Comment</button>
</form>";

getComments($conn);
?>

</body>

</head>
</html>
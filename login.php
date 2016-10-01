<?php
    session_start();
    session_regenerate_id();
    if(isset($_SESSION['user']))      // if there is valid session
    {
        header("Location: index.php");
    }
?>
<html>
    <body>
        <form action="loginCheck.php" method="post">
        User ID:<br>
        <input type="text" name="userid">
        <br>
        Password:<br>
        <input type="password" name="userpassword">
        <br><br>
        <input type="submit" value="Login">
        </form>
    </body>
</html>
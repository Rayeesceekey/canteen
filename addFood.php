<html>
<body>

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))      // if there is no valid session
{
    header("Location: login.php");
}

if($_SESSION['usertype']!='root'){
    header("Location: index.php");
}

?>
    <p>Add a food</p>
    <form action="addFoodPost.php" method="post">
        Food Name:<br>
        <input type="text" name="foodname">
        <br>
        Food Price:<br>
        <input type="text" name="foodprice">
        <br><br>
        <input type="submit" value="Add Food">
    </form>
    <br><br>
     <br><br>
    <form action="index.php" method="post">
    <input type="submit" value="Back to home">
     </form>
</body>
</html>



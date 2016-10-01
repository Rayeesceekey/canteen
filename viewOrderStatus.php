<html>
<body>

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))      // if there is no valid session
{
    header("Location: login.php");
}
$thisuser=$_SESSION['user'];

?>
    Available Menus
    <br><br><br><br>
    <?php
        require_once 'connectToDB.php';
        $conn = get_db_connection();

        $sql = "SELECT orderid,orderstatus FROM order_table where orderuid = '$thisuser'";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<form action='viewOrderStatusPost.php' method='post'><input type='hidden' name='orderid'  value='".$row["orderid"]."'><input type='submit' value='Order ".$row["orderid"]." Status: ".$row["orderstatus"]."'></form>"."<br>";
        }

        $conn->close();
    ?>
    <br><br>
    <form action="index.php" method="post">
    <input type="submit" value="Back">
    </form>

</body>
</html>



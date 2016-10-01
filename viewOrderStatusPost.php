<html>
<body>

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))      // if there is no valid session
{
    header("Location: login.php");
}

if(isset($_POST['orderid']) ) 
{
    $orderid=$_POST['orderid'];   
} else {
    header( "Location: viewOrderStatus.php" );
}
?>
    Order Details
    <br><br>
    Order id:
    <?php
        echo $orderid;
    ?>
    <br><br>
    Order Status: 
    <?php
        require_once 'connectToDB.php';
        $conn = get_db_connection();

        $sql = "SELECT orderid, orderstatus FROM order_table where orderid = $orderid";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo $row["orderstatus"];
    ?>
    <br><br>
    Food list:
    <br>
    <?php
        $sql2 = "SELECT orderfoodfid,orderfoodoid,orderfoodfcount FROM order_food_table where orderfoodoid = $orderid";
        $result2 = $conn->query($sql2);
        while($row2 = $result2->fetch_assoc()) {
            $thisfoodid = $row2['orderfoodfid'];
            $sql3 = "SELECT foodid,foodname,foodprice FROM food_table where foodid = $thisfoodid";
            $result3 = $conn->query($sql3);
            $row3 = $result3->fetch_assoc();
            echo $row2["orderfoodfcount"] ."x ". $row3["foodname"]." at Rs.".$row3["foodprice"]." each<br>";
        }

        $conn->close();
    ?>

</body>
</html>



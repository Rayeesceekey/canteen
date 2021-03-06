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

if(isset($_POST['orderid']) ) 
{
    $orderid=$_POST['orderid'];   
} else {
    header( "Location: editOrder.php" );
}
?>
    Order Details
    <br><br>
    Order id:
    <?php
        echo $orderid;
    ?>
    <br><br>
    <form action="editOrderPostPost.php" method="post">
    Order Status: 
    <?php
        require_once 'connectToDB.php';
        $conn = get_db_connection();

        $sql = "SELECT orderid,orderuid,orderstatus FROM order_table where orderid = $orderid";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        echo "<select name='orderstatus'>";
        
        if($row["orderstatus"]==ORDER_PLACED){
            echo "<option value='ORDER_PLACED' selected='selected'>ORDER_PLACED</option>";
            echo "<option value='ORDER_PROCESSING'>ORDER_PROCESSING</option>";
            echo "<option value='ORDER_PROCESSED'>ORDER_PROCESSED</option>";
        } else if($row["orderstatus"]==ORDER_PROCESSING){
            echo "<option value='ORDER_PLACED'>ORDER_PLACED</option>";
            echo "<option value='ORDER_PROCESSING' selected='selected'>ORDER_PROCESSING</option>";
            echo "<option value='ORDER_PROCESSED'>ORDER_PROCESSED</option>";
        } else if($row["orderstatus"]==ORDER_PROCESSED){
            echo "<option value='ORDER_PLACED'>ORDER_PLACED</option>";
            echo "<option value='ORDER_PROCESSING'>ORDER_PROCESSING</option>";
            echo "<option value='ORDER_PROCESSED' selected='selected'>ORDER_PROCESSED</option>";
        }
        
        echo "</select>";
    ?>
    <input type="hidden" name="orderid" value="<?php echo $orderid ?>">
    <input type="submit" value="Update">
    </form>
    Order by user: 
    <?php 
        echo $row["orderuid"];
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



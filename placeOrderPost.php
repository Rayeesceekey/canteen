<html>
<body>

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))      // if there is no valid session
{
    header("Location: login.php");
}

if(isset($_POST['menuid']) ) 
{
    $menuid=$_POST['menuid'];   
} else {
    header( "Location: placeOrder.php" );
}
?>
    Enter quantity of food items needed from menu: 
    <?php
        echo $menuid;
    ?>
    <br><br><br><br>
    <form action="placeOrderPostPost.php" method="post">
    <?php
        require_once 'connectToDB.php';
        $conn = get_db_connection();

        $sql = "SELECT menufoodmid,menufoodfid FROM menu_food_table where menufoodmid = '$menuid'";
        $result = $conn->query($sql);
        
        while($row = $result->fetch_assoc()) {
            $sql2 = "SELECT foodid,foodname,foodprice FROM food_table where foodid = $row[menufoodfid]";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo $row2["foodname"]." Rs.".$row2["foodprice"]. "  <input type='text' name='".$row2["foodid"]."' value='0'>" . "<br>";
        }
        $conn->close();
    ?>

    <input type="hidden" name="orderuid" value="<?php echo $_SESSION['user']?>">
    <input type="hidden" name="orderstatus" value="ORDER_PLACED">
    <input type="submit" value="Place Order">
    </form>
    <br><br>
    <form action="placeOrder.php" method="post">
    <input type="submit" value="Back">
     </form>

</body>
</html>



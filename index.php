<html>
<body>

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))      // if there is no valid session
{
    header("Location: login.php");
}

echo("Welcome");

?>

<!-- Admin options -->
<?php
if($_SESSION['usertype']=='root'){
?>
<br><br><br><br>
<a href="addFood.php">Add a food</a><br>
<a href="addMenu.php">Add a menu</a><br>
<br><br>
<!--
<a href="editFood.php">Edit a food</a><br>
<a href="editMenu.php">Edit a menu</a><br>
-->
<a href="viewMenu.php">View menu</a><br>
<br><br>
<a href="editOrder.php">Edit orders</a><br>
<br><br>
<form action="logout.php" method="post">
<input type="submit" value="Logout">
</form>
<?php
}
?>

<!-- Cust options -->
<?php
if($_SESSION['usertype']=='cust'){
?>
<br><br><br><br>
<a href="viewMenu.php">View menu</a><br>
<a href="viewOrderStatus.php">View order status</a><br>
<br><br>
<a href="placeOrder.php">Place an order</a><br>
<br><br>
<form action="logout.php" method="post">
<input type="submit" value="Logout">

<?php
}
?>


</body>
</html>



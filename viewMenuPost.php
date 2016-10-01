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
    header( "Location: viewMenu.php" );
}
?>
    Food items in menu
    <?php
        echo $menuid;
    ?>
    <br><br><br><br>
    <?php
        require_once 'connectToDB.php';
        $conn = get_db_connection();

        $sql = "SELECT menufoodmid,menufoodfid FROM menu_food_table where menufoodmid = '$menuid'";
        $result = $conn->query($sql);
        

        while($row = $result->fetch_assoc()) {
            $sql2 = "SELECT foodid,foodname,foodprice FROM food_table where foodid = $row[menufoodfid]";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            echo $row2["foodname"]." Rs.".$row2["foodprice"]."<br>";
        }
        $conn->close();
    ?>
    <br><br>
    <form action="viewMenu.php" method="post">
    <input type="submit" value="Back">
     </form>

</body>
</html>



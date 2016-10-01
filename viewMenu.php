<html>
<body>

<?php
session_start();
session_regenerate_id();
if(!isset($_SESSION['user']))      // if there is no valid session
{
    header("Location: login.php");
}

?>
    Available Menus
    <br><br><br><br>
    <?php
        require_once 'connectToDB.php';
        $conn = get_db_connection();

        $sql = "SELECT menuid FROM menu_table where menustatus = 'available'";
        $result = $conn->query($sql);
        $conn->close();

        while($row = $result->fetch_assoc()) {
            echo "<form action='viewMenuPost.php' method='post'><input type='hidden' name='menuid'  value='".$row["menuid"]."'><input type='submit' value='".$row["menuid"]."'></form>"."<br>";
        }
    ?>
    <br><br>
    <form action="index.php" method="post">
    <input type="submit" value="Back">
    </form>

</body>
</html>



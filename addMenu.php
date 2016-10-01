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
    <p>Add a Menu</p>
    <form action="addMenuPost.php" method="post">
        Menu ID:<br>
        <input type="text" name="menuid">
        <br>
        Menu Status:<br>
        <select name="menustatus">
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
        <br>
        Food in Menu:<br>
            <?php
                require_once 'connectToDB.php';
                $conn = get_db_connection();

                $sql = "SELECT foodid, foodname, foodprice FROM food_table";
                $result = $conn->query($sql);
                $conn->close();
                while($row = $result->fetch_assoc()) {
                    echo "<input type='checkbox' name='menufood[]' value='". $row["foodid"] ."'> " . $row["foodname"] . " Rs." . $row["foodprice"] . "/-<br>";
                }

            ?>
        <br><br>
        <input type="submit" value="Add Menu">
    </form>
      <br><br>
      <form action="index.php" method="post">
      <input type="submit" value="Back to home">
     </form>

</body>
</html>



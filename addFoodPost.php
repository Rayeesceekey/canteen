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

if( isset($_POST['foodname']) && isset($_POST['foodprice']) )
{
    insertFood($_POST['foodname'],$_POST['foodprice']);
    header( "Location: addFood.php" );    
} else {
    header( "Location: error.php" );
}

function insertFood($name,$price)
{
    require_once 'connectToDB.php';
    $conn = get_db_connection();

    echo gettype((int)$price);

    $sql = "INSERT INTO food_table (foodname, foodprice) VALUES ('$name',$price)";
    $result = $conn->query($sql);
    $conn->close();
}
?>

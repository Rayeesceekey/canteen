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

    if(isset($_POST['orderid']) && isset($_POST['orderstatus'])) 
    {
        $orderid=$_POST['orderid'];
        $orderstatus=$_POST['orderstatus'];   
    } else {
        header( "Location: editOrder.php" );
    }

    require_once 'connectToDB.php';
    $conn = get_db_connection();

    $sql = "update order_table set orderstatus = '$orderstatus' where orderid = $orderid";
    $result = $conn->query($sql);
    $conn->close();

    header( "Location: editOrder.php" );
?>

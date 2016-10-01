<?php
    session_start();
    session_regenerate_id();
    if(!isset($_SESSION['user']))      // if there is no valid session
    {
        header("Location: login.php");
    }

    if(isset($_POST['orderstatus']) && isset($_POST['orderuid'])) 
    {
        $orderstatus=$_POST['orderstatus'];   
        $orderuid=$_POST['orderuid'];  
    } else {
        header( "Location: placeOrder.php" );
    }

    require_once 'connectToDB.php';
    $conn = get_db_connection();

    $sql = "SELECT foodid,foodname,foodprice FROM food_table";
    $result = $conn->query($sql);

    $sql2 = "SELECT max(orderid) FROM order_table";
    $result2 = $conn->query($sql2);

    $row2 = $result2->fetch_assoc();
    $orderid=1;
    if($row2["max(orderid)"]!=null){
        $orderid=1+$row2["max(orderid)"];
    }

    $sql3 = "INSERT INTO order_table (orderid, orderuid, orderstatus) VALUES ($orderid,$orderuid,'$orderstatus')";
    $result3 = $conn->query($sql3);
    
    while($row = $result->fetch_assoc()) {
        if(isset($_POST[$row["foodid"]])){
            $thisfoodid = $row["foodid"];
            $thisfoodcount = $_POST[$row["foodid"]];
            if($thisfoodcount>0){
                $sql4 = "INSERT INTO order_food_table (orderfoodoid, orderfoodfid, orderfoodfcount) VALUES ($orderid,$thisfoodid,$thisfoodcount)";
                $result4 = $conn->query($sql4);
            }
        }
    }
    
    $conn->close();
    
    header( "Location: placeOrder.php" );
?>
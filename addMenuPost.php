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

if( isset($_POST['menustatus']) && isset($_POST['menuid']) ) 
{
    insertMenu($_POST['menuid'],$_POST['menustatus'],$_POST['menufood']);
    header( "Location: addMenu.php" );    
} else {
    header( "Location: error.php" );
}

function insertMenu($id,$status,$foods)
{
    require_once 'connectToDB.php';
    $conn = get_db_connection();

    $sql = "INSERT INTO menu_table (menuid,menustatus) VALUES ('$id','$status')";
    $result = $conn->query($sql);

    $n = count($foods);

    for($i=0;$i<$n;$i++){
        $sql = "INSERT INTO menu_food_table (menufoodmid, menufoodfid) VALUES ('$id',$foods[$i])";
        $result = $conn->query($sql);
    }

    $conn->close();
}
?>

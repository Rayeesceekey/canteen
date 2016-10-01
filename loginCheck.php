<?php 
session_start();
if( isset($_POST['userid']) && isset($_POST['userpassword']) )
{
    if( auth($_POST['userid'], $_POST['userpassword']) )
    {
        // auth okay, setup session
        $_SESSION['user'] = $_POST['userid'];
        $_SESSION['usertype'] = getUserType($_POST['userid']);
        // redirect to required page
        header( "Location: index.php" );
    } else {
        // didn't auth go back to loginform
        header( "Location: login.php" );
    }
} else {
    // username and password not given so go back to login
    header( "Location: login.php" );
}

function auth($uid,$upass){

    require_once 'connectToDB.php';
    $conn = get_db_connection();

    $sql = "SELECT userid, userpassword FROM user_table where userid = $uid and userpassword = '$upass'";
    $result = $conn->query($sql);
    $conn->close();
    if ($result->num_rows == 1) {
        return 1;
    } else {
        return 0;
    }
}

function getUserType($uid){

    require_once 'connectToDB.php';
    $conn = get_db_connection();

    $sql = "SELECT userid, usertype FROM user_table where userid = $uid";
    $result = $conn->query($sql);
    $conn->close();
    
    $row = mysqli_fetch_assoc($result);
    return $row["usertype"];
}

?>
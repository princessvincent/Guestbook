<?php
include_once "connection.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];

    $del = "DELETE FROM member WHERE id = '$id'";
    $res = mysqli_query($conn,$del);
    
    $_SESSION["message"] = "Guest Deleted";
    header("location:view.php");
}


?>
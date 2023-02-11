<?php 
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
}

include("global/conn.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM camps WHERE id='$id'";
}else{
    header("Location: campdetails.php");
}

if(mysqli_query($conn, $sql)){
    header("Location: campdetails.php");
}else{
    echo "Error deleting record: " . mysqli_error($conn);
}
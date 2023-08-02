<?php
session_start();
if(isset($_SESSION['admin'])){
    include("../include/connection.php");
    $id=$_POST['id'];
    $query="UPDATE doctors SET status='rejected' WHERE id='$id'";
    mysqli_query($connect,$query);
}
else{
    header("location:../index.php");
}
?>
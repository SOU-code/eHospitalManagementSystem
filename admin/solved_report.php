<?php
session_start();
if(isset($_SESSION['admin'])){
    include("../include/connection.php");
    $id=$_GET['id'];
    $query="UPDATE reports SET status='approved' WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    header("location:./report.php");
}
else{
    header("location:../index.php");
}
?>
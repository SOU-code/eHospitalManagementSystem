<?php
session_start();
if(isset($_SESSION['admin'])){
    include("../include/connection.php");
    $id=$_GET['id'];
    $query="DELETE FROM doctors WHERE id='$id'";
    $result=mysqli_query($connect,$query);
    header("location:./doctor.php");
}
else{
    header("location:../index.php");
}
?>
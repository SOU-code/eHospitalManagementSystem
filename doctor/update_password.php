<?php
include("../include/connection.php");
session_start();
if (isset($_SESSION['doctor'])) {
    $id = $_GET['id'];
    if (isset($_POST['update'])) {
        $old = $_POST['oldpass'];
        $new = $_POST['newpass'];
        $con = $_POST['conpass'];
        $query = "SELECT * FROM doctors WHERE id='$id'";
        $result=mysqli_query($connect, $query);
        $row=mysqli_fetch_assoc($result);
        if($old!=$row['password']){
            header("location:./profile.php?pflag=8");
        }
        elseif($new!=$con){
            header("location:./profile.php?pflag=9");
        }
        else{
            $query1 = "UPDATE doctors SET password='$new' WHERE id='$id'";
            $result1=mysqli_query($connect, $query1);
            header("location:./profile.php?pflag=1");
        }
    }

} else {
    header("location:../index.php");
}
?>
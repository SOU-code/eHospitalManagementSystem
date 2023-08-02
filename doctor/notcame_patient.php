<?php
session_start();
if(isset($_SESSION['doctor'])){
    include("../include/connection.php");
    $user=$_GET['id'];
    $query="UPDATE appointment SET status='canceled' WHERE username='$user' and status='approved'";
    $result=mysqli_query($connect,$query);
    $query3="DELETE FROM booked_appointments WHERE patient_username='$user'";
    $result3=mysqli_query($connect,$query3);
    header("location:./book_appointment.php");
}
else{
    header("location:../index.php");
}
?>
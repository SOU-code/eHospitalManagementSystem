<?php
session_start();
if(isset($_SESSION['doctor'])){
    include("../include/connection.php");
    $user=$_GET['id'];
    $query="UPDATE appointment SET status='cleared' WHERE username='$user' and status='approved' ";
    $result=mysqli_query($connect,$query);
    $query1="SELECT * FROM booked_appointments WHERE patient_username='$user'";
    $result1=mysqli_query($connect,$query1);
    $row1=mysqli_fetch_array($result1);
    $fee=$row1['fees'];
    $doc=$row1['doc_username'];
    $query2="INSERT INTO `income`(`fees`, `doctor`, `patient`) VALUES ('$fee','$doc','$user')";
    $result2=mysqli_query($connect,$query2);
    $query3="DELETE FROM booked_appointments WHERE patient_username='$user'";
    $result3=mysqli_query($connect,$query3);
    header("location:./book_appointment.php");
}
else{
    header("location:../index.php");
}
?>
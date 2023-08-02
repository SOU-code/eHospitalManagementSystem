<?php
session_start();
if (isset($_SESSION['admin'])) {
    include("../include/connection.php");
    $id = $_GET['id'];
    if (isset($_POST['update'])) {
        $salary = $_POST['salary'];
        // Update the 'salary' field instead of 'status' field
        $query = "UPDATE doctors SET salary='$salary' WHERE id='$id'";
        mysqli_query($connect, $query);
        header("location:./doctor.php");
    }

} else {
    header("location:../index.php");
}
?>
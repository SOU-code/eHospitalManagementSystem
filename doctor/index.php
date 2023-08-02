<?php
session_start();
if(isset($_SESSION['doctor'])){
    $doc=$_SESSION['doctor'];
    include("../include/header.php");
    include("../include/connection.php");
}
else{
    header("location:../doctorlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin HMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <!--Sidebar  -->
                <?php
                    include("./sidebar.php");
                ?>
            </div>
            <div class="col-md-10 main-content">
                <!-- Add your main content here -->
                <h4 class="my-2">Doctors Dashboard</h4>
                <div class="col-md-12 my-1">
                    <div class="row">
                        <div class="col-md-3 bg-success mx-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $ad=mysqli_query($connect,"SELECT * FROM admin");
                                    $nums=mysqli_num_rows($ad);
                                    ?>
                                    <div class="col-md-9">
                                        <h4 class="text-white my-4">My Profile</h>
                                    </div>
                                    <div class="col-md-3">
                                    <a href="./profile.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-info mx-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $bk="SELECT * FROM booked_appointments WHERE doc_username='$doc'";
                                    $bk_result=mysqli_query($connect,$bk);
                                    $bk_num=mysqli_num_rows($bk_result);
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $bk_num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Appointments</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="book_appointment.php"><i class="fa-solid fa-calendar fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $pt="SELECT * FROM appointment WHERE status='pending'";
                                    $pt_result=mysqli_query($connect,$pt);
                                    $pt_num=mysqli_num_rows($pt_result);
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $pt_num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patients</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="patient.php"><i class="fa-solid fa-bed fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
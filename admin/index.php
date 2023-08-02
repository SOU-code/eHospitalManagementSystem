<?php
session_start();
if(isset($_SESSION['admin'])){
    include("../include/header.php");
    include("../include/connection.php");
}
else{
    header("location:../adminlogin.php");
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
                <h4 class="my-2">Admin Dashboard</h4>
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
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $nums; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <i class="fa-solid fa-user-gear fa-3x my-4" style="color:white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-info mx-2">
                            <div class="col-md-12">
                                <div class="row">
                                <?php
                                    $dc=mysqli_query($connect,"SELECT * FROM doctors WHERE status='approved'");
                                    $num2=mysqli_num_rows($dc);
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num2; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctors</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="doctor.php"><i class="fa-solid fa-user-doctor fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $pt=mysqli_query($connect,"SELECT * FROM patients");
                                    $nums3=mysqli_num_rows($pt);
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $nums3; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patients</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="patient.php"><i class="fa-solid fa-bed fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-danger mx-2 my-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $rp=mysqli_query($connect,"SELECT * FROM reports");
                                    $nums4=mysqli_num_rows($rp);
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $nums4; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Reports</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="report.php"><i class="fa-solid fa-flag fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2 my-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $jb=mysqli_query($connect,"SELECT * FROM doctors WHERE status='pending'");
                                    $num1=mysqli_num_rows($jb);
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $num1; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Request</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="jobrequest.php" class="text-white"><i class="fa-solid fa-book-open fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-success mx-2 my-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <?php
                                    $in=mysqli_query($connect,"SELECT * FROM income");
                                    $total=0;
                                    while($row9=mysqli_fetch_array($in)){
                                        $total=$total+$row9['fees'];
                                    }
                                    ?>
                                    <div class="col-md-9">
                                        <h5 class="my-2 text-white" style="font-size:30px"><?php echo $total; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="income.php"><i class="fa-solid fa-money-check-dollar fa-3x my-4" style="color:white"></i></a>
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

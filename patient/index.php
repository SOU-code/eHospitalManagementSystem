<?php
session_start();
if(isset($_SESSION['patient'])){
    include("../include/header.php");
    include("../include/connection.php");
    if (isset($_POST['send'])) {
        // Fetch the form data
        $title = $_POST['title'];
        $message = $_POST['message'];

        // Perform form validation
        $error = array();
        $success=array();
        if (empty($title)) {
            $error['doc'] = "Title is required";
        }

        elseif (empty($message)) {
            $error['doc'] = "Message is required";
        }
        if (empty($error)) {
            $user=$_SESSION['patient'];
            $query="INSERT INTO `reports`(`title`, `message`, `username`, `date_reg`,`status`) VALUES ('$title','$message','$user',NOW(),'pending')";
            $result=mysqli_query($connect,$query);
            $success['doc']="Successfully Reported";
        }
    }
}
else{
    header("location:../patientlogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin HMS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/style.css">
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
                                    <div class="col-md-9">
                                        <h5 class="text-white my-2">Book</h5>
                                        <h5 class="text-white">Appointment</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="appointment.php"><i class="fa-solid fa-calendar fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 bg-warning mx-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 class="text-white my-4">My History</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="history.php"><i class="fa-solid fa-file-invoice fa-3x my-4" style="color:white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 my-4">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6 bg-info">
                            <div class="col-md-12 mx-2 my-4">
                                <h4 class="text-center my-2">Send A Report</h4>
                                <?php
                                if(isset($error['doc'])){
                                    $show='<div class="alert alert-danger">'.$error['doc'].'</div>';
                                }
                                elseif(isset($success['doc'])){
                                    $show='<div class="alert alert-success">'.$success['doc'].'</div>';
                                }
                                else{
                                    $show="";
                                }
                                echo $show;
                                ?>
                                <form action="index.php" method="post">
                                    <div class="form-group my-2">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" autocomplete="off"
                                        value="<?php if(isset($title)){
                                            echo $title;
                                        } ?>"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Message</label>
                                        <input type="text" name="message" class="form-control" autocomplete="off"
                                        value="<?php if(isset($message)){
                                            echo $message;
                                        } ?>"
                                        >
                                    </div>
                                    <input type="submit" name="send" value="Send Report" class="btn btn-success">
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
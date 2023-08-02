<?php
session_start();
if(isset($_SESSION['patient'])){
    include("../include/header.php");
    include("../include/connection.php");
    $user=$_SESSION['patient'];
    if (isset($_POST['book'])) {
        // Fetch the form data
       $ap="SELECT * FROM appointment WHERE username='$user' AND status!='canceled' AND status!='cleared'";
       $ap_result=mysqli_query($connect,$ap);
       if(mysqli_num_rows($ap_result)<1){
            $book_date = $_POST['book_date'];
            $symptoms = $_POST['symptoms'];
            $success=array();
            $user=$_SESSION['patient'];
            $query="INSERT INTO `appointment`(`book_date`, `symptoms`, `username`, `date_reg`,`status`) VALUES ('$book_date','$symptoms','$user',NOW(),'pending')";
            $result=mysqli_query($connect,$query);
            $success['doc']="Successfully Appointed";
       }
       else{
            $error=array();
            $error['doc']="You have one proccessing appointed";
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
                <div class="row">
                    <div class="col-md-3"></div>
                        <div class="col-md-6 jumbotron">
                            <?php
                                if(isset($success['doc'])){
                                    $show='<div class="alert alert-success">'.$success['doc'].'</div>';
                                }
                                elseif(isset($error['doc'])){
                                    $show='<div class="alert alert-danger">'.$error['doc'].'</div>';
                                }
                                else{
                                    $show="";
                                }
                                echo $show;
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Date of Book</label>
                                    <input type="date" name="book_date" class="form-control" autocomplete="off" placeholder="Date of Book" required>
                                </div>
                                <div class="form-group">
                                    <label>Symptoms</label>
                                    <input type="text" name="symptoms" class="form-control" autocomplete="off" placeholder="Enter Symptoms" required>
                                </div>
                                <input type="submit" name="book" value="Book" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
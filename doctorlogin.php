<?php
    session_start();
    include("./include/connection.php");
    // Check if the login form is submitted
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error=array(); 
        if(empty($username)){
            $error['doc']="Enter Username";
        }elseif(empty($password)){
            $error['doc']="Enter Password";
        }
        if(count($error)==0){
            $query="SELECT * FROM doctors WHERE username='$username' AND password='$password' ";
            $result=mysqli_query($connect,$query);
            $row=mysqli_fetch_array($result);
            if(empty($username)){
                $error['doc']="Enter Username";
            }elseif(empty($password)){
                $error['doc']="Enter Password";
            }
            elseif (mysqli_num_rows($result)==1) {
                if($row['status']=="pending"){
                    $error['doc']="Wait untill your status approved";
                }
                elseif($row['status']=="rejected"){
                    $error['doc']="Sorry!! Contact with admin";
                }
                else{
                    // Login successful
                    $_SESSION['doctor']=$username;
                    $_SESSION['doc_id']=$row['id'];
                    header("location:./doctor/index.php");
                }
            }
            else {
                // Login failed
                $error['doc']="Invalid Username or Password";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Doctor Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        include("./header.php");
    ?>
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <form action="" method="post">
                    <img src="./img/doctor-log.png" alt="" class="col-md-12">
                    <h5 class="text-center my-1">Doctors Login</h5>
                    <?php 
                    if(isset($error['doc'])){
                        $show='<div class="alert alert-danger">'.$error['doc'].'</div>';
                    }
                    else{
                        $show="";
                    }
                    echo $show;
                    ?>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Enter User name" re>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Enter Password">
                    </div>
                    <input type="submit" name="login" value="LOGIN" class="btn btn-success">
                </form>
                <p class="my-1">I don't have an account . <a href="apply.php"> Apply Now!!!</a></p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
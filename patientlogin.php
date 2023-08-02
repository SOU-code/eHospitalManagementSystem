<?php
    session_start();
    include("./include/connection.php");
    // Check if the login form is submitted
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error=array(); 
        if(empty($username)){
            $error['pati']="Enter Username";
        }elseif(empty($password)){
            $error['pati']="Enter Password";
        }
        if(count($error)==0){
            $query="SELECT * FROM patients WHERE username='$username' AND password='$password' ";
            $result=mysqli_query($connect,$query);
            $row=mysqli_fetch_array($result);
            if(empty($username)){
                $error['pati']="Enter Username";
            }elseif(empty($password)){
                $error['pati']="Enter Password";
            }
            elseif (mysqli_num_rows($result)==1) {
                // Login successful
                $_SESSION['patient']=$username;
                $_SESSION['pati_id']=$row['id'];
                header("location:./patient/index.php");
            }
            else {
                // Login failed
                $error['pati']="Invalid Username or Password";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Patient Login</title>
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
                    <img src="./img/patient-log.png" alt="" class="col-md-12">
                    <h5 class="text-center my-1">Patient Login</h5>
                    <?php 
                    if(isset($error['pati'])){
                        $show='<div class="alert alert-danger">'.$error['pati'].'</div>';
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
                <p class="my-1">I don't have an account . <a href="account.php"> Create Now!!!</a></p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
<?php
    session_start();
    include("./include/connection.php");
    // Check if the login form is submitted
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $error=array(); 
        if(empty($username)){
            $error['admin']="Enter Username";
        }elseif(empty($password)){
            $error['admin']="Enter Password";
        }
        if(count($error)==0){
            $query="SELECT * FROM admin WHERE username='$username' AND password='$password' ";
            $result=mysqli_query($connect,$query);
            if (mysqli_num_rows($result)==1) {
                // Login successful
                $_SESSION['admin']=$username;
                header("location:./admin/index.php");
            } else {
                // Login failed
                $error['admin']="Invalid Username or Password";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Admin Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
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
                    <img src="./img/admin.jpg" alt="" class="col-md-12">
                    <?php 
                    if(isset($error['admin'])){
                        $show='<div class="alert alert-danger">'.$error['admin'].'</div>';
                    }
                    else{
                        $show="<div class='alert alert-success text-center'>username:admin123 | password:admin@123</div>";
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
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>

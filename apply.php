<?php
// Check if the registration form is submitted
    session_start();
    include("./include/connection.php");
    if (isset($_POST['register'])) {
        // Fetch the form data
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $specialization = $_POST['specialization'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Perform form validation
        $error = array();
        $success=array();

        if (empty($fullname)) {
            $error['doc'] = "Full Name is required";
        }

        elseif (empty($email)) {
            $error['doc'] = "Email is required";
        }

        elseif (empty($phone)) {
            $error['doc'] = "Phone Number is required";
        }

        elseif (empty($gender)) {
            $error['doc'] = "Gender is required";
        }

        elseif (empty($specialization)) {
            $error['doc'] = "Specialization is required";
        }

        elseif(empty($username)) {
            $error['doc'] = "Username is required";
        }

        elseif(empty($password)) {
            $error['doc'] = "Password is required";
        }

        elseif(empty($confirm_password)) {
            $error['doc'] = "Confirm Password is required";
        }

            // Add more form validation rules as needed

            // If there are no errors, proceed with registration logic
        if (empty($error)) {
            if ($password !== $confirm_password) {
                $error['doc'] = "Password and Confirm Password must match";
            } 
            else{
                $query="SELECT * FROM doctors WHERE email='$email'";
                $result=mysqli_query($connect,$query);
                if(mysqli_num_rows($result)){
                    $error['doc']="Email Already Registered";
                }
                else{
                    $query="SELECT * FROM doctors WHERE phone='$phone'";
                    $result=mysqli_query($connect,$query);
                    if(mysqli_num_rows($result)){
                        $error['doc']="Phone Already Registered";
                    }
                    else{
                        $query="SELECT * FROM doctors WHERE username='$username'";
                        $result=mysqli_query($connect,$query);
                        if(mysqli_num_rows($result)){
                            $error['doc']="Username Already Registered";
                        }
                        else{
                            $query="INSERT INTO `doctors`( `name`, `email`, `specialization`, `phone`, `gender`, `username`, `password`,`status`,`salary`) 
                            VALUES ('$fullname','$email','$specialization','$phone','$gender','$username','$password','pending','0')";
                            $result=mysqli_query($connect,$query);
                            $success['doc']="Successfully Registered!!";
                        }
                    }
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>HMS Doctor Registration</title>
</head>
<body>
    <?php
        include("./header.php");
    ?>
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron">
                <h5 class="text-center mb-4">Doctor Registration</h5>
                <?php 
                    if(isset($error['doc'])){
                        $show='<div class="alert alert-danger">'.$error['doc'].'</div>';
                    }
                    elseif(isset($success['doc'])){
                        $show='<div class="alert alert-success">'.$success['doc'].' <a href="doctorlogin.php">Login Now!!</a></div>';
                    }
                    else{
                        $show="";
                    }
                    echo $show;
                ?>
                <form action="apply.php" method="post">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" autocomplete="off"
                        value="<?php if(isset($fullname)){
                            echo $fullname;
                        }?>"
                        >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off"
                        value="<?php if(isset($email)){
                            echo $email;
                        } ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone" class="form-control" autocomplete="off"
                        value="<?php if(isset($phone)){
                            echo $phone;
                        } ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Specialization</label>
                        <input type="text" name="specialization" class="form-control" autocomplete="off" 
                        value="<?php if(isset($specialization)){
                            echo $specialization;
                        } ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" autocomplete="off"
                        value="<?php if(isset($username)){
                            echo $username;
                        } ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off"
                        value="<?php if(isset($password)){
                            echo $password;
                        } ?>"
                        >
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" autocomplete="off"
                        value="<?php if(isset($confirm_password)){
                            echo $confirm_password;
                        } ?>"
                        >
                    </div>
                    <input type="submit" name="register" value="Register" class="btn btn-primary btn-block">
                </form>
                <p class="my-1">Already have an account . <a href="doctorlogin.php"> Sign In Now!!!</a></p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>
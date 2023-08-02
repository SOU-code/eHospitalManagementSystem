<?php
session_start();
if(isset($_SESSION['doctor'])){
    include("../include/header.php");
    include("../include/connection.php");
}
else{
    header("location:../index.php");
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
                <?php
                $id=$_SESSION['doc_id'];
                $query="SELECT * FROM doctors WHERE id='$id'";
                $row=mysqli_query($connect,$query);
                $result=mysqli_fetch_assoc($row);
                ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <table class='table table-bordered'>
                                <tr>
                                    <th class="text-center" colspan=2><h4>Doctor Details</h4></th>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td><?php echo $result['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $result['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><?php echo $result['phone']; ?></td>
                                </tr>
                                <tr>
                                    <td>Specialization:</td>
                                    <td><?php echo $result['specialization']; ?></td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td><?php echo $result['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Salary:</td>
                                    <td>Rs. <?php echo $result['salary']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td><?php echo $result['username']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="my-4">
                                <form action="update_password.php?id=<?php echo $id; ?>" method="post">
                                <h4 class="text-center">Change Password</h4>
                                <?php
                                if(isset($_GET['pflag'])){
                                    $pflag=$_GET['pflag'];
                                    if($pflag==8){
                                        $show='<div class="alert alert-warning"> Previous Password Wrong </div>';
                                    }
                                    elseif($pflag==9){
                                        $show='<div class="alert alert-warning"> Confirm Password must be Same as New Password </div>';
                                    }
                                    else{
                                        $show='<div class="alert alert-success"> Password Change Successfully </div>';
                                    }
                                    echo $show;
                                }
                                ?>
                                <div class="form-grou my-3p">
                                    <label for="oldpass">Old Password</label>
                                    <input type="password" name="oldpass" class="form-control" autocomplete="off" required>
                                </div>
                                <div class="form-grou my-3p">
                                    <label for="newpass">New Password</label>
                                    <input type="password" name="newpass" class="form-control" autocomplete="off" required>
                                </div>
                                <div class="form-grou my-3p">
                                    <label for="conpass">Confirm Password</label>
                                    <input type="password" name="conpass" class="form-control" autocomplete="off" >
                                </div>
                                <input type="submit" name="update" value="Update" class="my-3 btn btn-success btn-block" required>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

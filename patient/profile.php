<?php
session_start();
if(isset($_SESSION['patient'])){
    include("../include/header.php");
    include("../include/connection.php");
}
else{
    header("location:../index.php");
}
?>
<?php
    if(isset($_POST['pupdate'])){
        $patient_user=$_SESSION['patient'];
        $old_pass=$_POST['oldpass'];
        $new_pass=$_POST['newpass'];
        $con_pass=$_POST['conpass'];
        $up_error=array();
        $up_success=array();
        $p_query="SELECT * FROM patients WHERE username='$patient_user' ";
        $p_result=mysqli_query($connect,$p_query);
        $p_row=mysqli_fetch_assoc($p_result);
        if($old_pass!=$p_row['password']){
            $up_error['doc']="Previous Password Incorrect";
        }
        elseif($new_pass!=$con_pass){
            $up_error['doc']="New and Confirm Password is Not Same";
        }
        else{
            $up_query="UPDATE patients SET password='$new_pass' WHERE username='$patient_user'";
            $up_result=mysqli_query($connect,$up_query);
            $up_success['doc']="Password Change Successfully";
        }
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
                <?php
                $id=$_SESSION['pati_id'];
                $query="SELECT * FROM patients WHERE id='$id'";
                $row=mysqli_query($connect,$query);
                $result=mysqli_fetch_assoc($row);
                ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <table class='table table-bordered'>
                                <tr>
                                    <th class="text-center" colspan=2><h4>Patients Details</h4></th>
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
                                    <td>Gender:</td>
                                    <td><?php echo $result['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username:</td>
                                    <td><?php echo $result['username']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div class="my-4">
                                <form action="profile.php" method="post">
                                <h4 class="text-center">Change Password</h4>
                                <?php
                                if(isset($up_error['doc'])){
                                    $show='<div class="alert alert-danger">'.$up_error['doc'].'</div>';
                                }
                                elseif(isset($up_success['doc'])){
                                    $show='<div class="alert alert-success">'.$up_success['doc'].'</div>';
                                }
                                else{
                                    $show="";
                                }
                                echo $show;
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
                                <input type="submit" name="pupdate" value="Update" class="my-3 btn btn-success btn-block" required>
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

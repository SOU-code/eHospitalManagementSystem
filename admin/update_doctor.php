<?php
session_start();
if(isset($_SESSION['admin'])){
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
                <!-- Add your main content here -->
                <h4 class="my-2 text-center">Doctor Details and Update Salary</h4>
                <?php
                $id=$_GET['id'];
                $query="SELECT * FROM doctors WHERE id='$id'";
                $row=mysqli_query($connect,$query);
                $result=mysqli_fetch_assoc($row);
                ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="my-3">Name: <?php echo $result['name']; ?></h5>
                            <h5 class="my-3">Email: <?php echo $result['email']; ?></h5>
                            <h5 class="my-3">Phone: <?php echo $result['phone']; ?></h5>
                            <h5 class="my-3">Specialization: <?php echo $result['specialization']; ?></h5>
                            <h5 class="my-3">Gender: <?php echo $result['gender']; ?></h5>
                            <h5 class="my-3">Salary: Rs. <?php echo $result['salary']; ?></h5>
                        </div>
                        <div class="col-md-4">
                            <form action="update_salary.php?id=<?php echo $id; ?>" method="post">
                            <div class="form-grou my-3p">
                                <input type="number" name="salary" class="form-control" autocomplete="off"
                                value="<?php $result['salary']; ?>">
                            </div>
                            <input type="submit" name="update" value="Update Salary" class="my-3 btn btn-success btn-block">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

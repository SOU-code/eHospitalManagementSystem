<?php
session_start();
if(isset($_SESSION['doctor'])){
    include("../include/header.php");
    include("../include/connection.php");
    if(isset($_POST['appointed'])){
        $patient_username=$_GET['id'];
        $fees=$_POST['fees'];
        $message=$_POST['message'];
        $doc=$_SESSION['doctor'];
        $query1="INSERT INTO `booked_appointments`( `fees`, `message`, `patient_username`, `doc_username`) VALUES ('$fees','$message','$patient_username','$doc')";
        $result1=mysqli_query($connect,$query1);
        $query2="UPDATE appointment SET status='approved' WHERE username='$patient_username' AND status='pending' ";
        $result2=mysqli_query($connect,$query2);
        header("location:./book_appointment.php");
    }
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
                <h4 class="my-2">Book Appoinment</h4>
                <div id="show">
                    <?php
                    $patient_username=$_GET['id'];
                    $query = "SELECT *
                    FROM appointment
                    RIGHT JOIN patients ON appointment.username = patients.username
                    WHERE patients.username = '$patient_username' AND appointment.status='pending' ORDER BY appointment.date_reg ASC ";
                    $row = mysqli_query($connect, $query);
                    $result=mysqli_fetch_array($row);
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
                                    <td>Appoinment Date:</td>
                                    <td><?php echo $result['book_date']; ?></td>
                                </tr>
                                <tr>
                                    <td>Symptoms:</td>
                                    <td><?php echo $result['symptoms']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <form action="take_patient.php?id=<?php echo $patient_username; ?>" method="post">
                                    <h4 class="text-center">Take Appoinment</h4>
                                    <div class="form-grou my-3p">
                                        <label for="fees">Fees</label>
                                        <input type="Number" name="fees" class="form-control" autocomplete="off" required>
                                    </div>
                                    <div class="form-grou my-3">
                                        <label for="message">Message</label>
                                        <input type="text" name="message" class="form-control" autocomplete="off" required>
                                    </div>
                                    <input type="submit" name="appointed" value="Appointed" class="my-3 btn btn-warning btn-block">
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

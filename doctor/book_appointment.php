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
                <!-- Add your main content here -->
                <h4 class="my-2">Reports Details</h4>
                <div id="show">
                    <?php
                    $doc=$_SESSION['doctor'];
                    $query = "SELECT *
                    FROM booked_appointments
                    INNER JOIN appointment ON booked_appointments.patient_username = appointment.username
                    WHERE booked_appointments.doc_username= '$doc' AND appointment.status='approved'  ORDER BY booked_appointments.id ASC ";
                    $result = mysqli_query($connect, $query);
                    $output = "";
                    if(mysqli_num_rows($result)>0){
                        $output .= "
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>Fees</th>
                                    <th>Message</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Symptoms</th>
                                    <th>Date</th>
                                    <th>Came</th>
                                    <th>Not Came</th>
                                </tr>";
                        while ($row = mysqli_fetch_array($result)) {
                            $p_user=$row['username'];
                            $query1="SELECT * FROM patients WHERE username='$p_user' ";
                            $result1=mysqli_query($connect,$query1);
                            $row1=mysqli_fetch_array($result1);
                            $output .= "<tr>
                                <td>" . $row['fees'] . "</td>
                                <td>" . $row['message'] . "</td>
                                <td>" . $row1['name'] . "</td>
                                <td>" . $row1['gender'] . "</td>
                                <td>" . $row['symptoms'] . "</td>
                                <td>" . $row['book_date'] . "</td>
                                <td><a href='came_patient.php?id=" . $row1['username'] ."'><button class='btn btn-success'>Done</button></a></td>
                                <td><a href='notcame_patient.php?id=" . $row1['username'] ."'><button class='btn btn-danger'>Not Done</button></a></td>
                            </tr>";
                        }
                        $output .= "
                            </table>
                        </div>
                        ";
                    }
                    else{
                        $output .= "<table class='table table-bordered'>
                        <tr>
                            <th colspan='6'>There are no patients yet.</th>
                        </tr>
                        </table>";
                    }
                    echo $output;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

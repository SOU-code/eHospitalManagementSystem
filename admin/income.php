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
                <h4 class="my-2">Reports Details</h4>
                <div id="show">
                    <?php
                    $query = "SELECT *
                    FROM income ";
                    $result = mysqli_query($connect, $query);
                    $output = "";
                    if(mysqli_num_rows($result)>0){
                        $output .= "
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>Patient Name</th>
                                    <th>Fees</th>
                                    <th>Doctor Name</th>
                                </tr>";
                        while ($row = mysqli_fetch_array($result)) {
                            $pati=$row['patient'];
                            $doc=$row['doctor'];
                            $query1 = "SELECT * FROM patients WHERE username='$pati' ";
                            $result1 = mysqli_query($connect, $query1);
                            $row1=mysqli_fetch_array($result1);
                            $query2 = "SELECT * FROM doctors WHERE username='$doc' ";
                            $result2 = mysqli_query($connect, $query2);
                            $row2=mysqli_fetch_array($result2);
                            $output .= "<tr>
                                <td>" . $row1['name'] . "</td>
                                <td>" . $row['fees'] . "</td>
                                <td>" . $row2['name'] . "</td>
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

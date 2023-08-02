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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Report HMS</title>
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
                    <h5 class="my-2 py-2 text-center bg bg-warning">Pending Reports Details</h5>
                    <?php
                    $user=$_SESSION['patient'];
                    $query = "SELECT * FROM reports WHERE status='pending' AND username='$user' ORDER BY date_reg ASC";
                    $result = mysqli_query($connect, $query);
                    $output = "";
                    if(mysqli_num_rows($result)>0){
                        $output .= "
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Username</th>
                                    <th>Date & Time</th>
                                </tr>";
                        if (mysqli_num_rows($result) < 1) {
                            $output .= "<tr>
                                <th colspan='8'>There are no job requests yet.</th>
                            </tr>";
                        }
                        while ($row = mysqli_fetch_array($result)) {
                            $output .= "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['title'] . "</td>
                                <td>" . $row['message'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['date_reg'] . "</td>
                            </tr>";
                        }
                        $output .= "
                            </table>
                        </div>
                        ";
                    }
                    else{
                        $output .= "<tr>
                            <th colspan='6'>There are no reports yet.</th>
                        </tr>";
                    }
                    echo $output;
                    ?>
                    <h5 class="my-2 py-2 text-center bg bg-success">Solved Reports Details</h5>
                    <?php
                    $query = "SELECT * FROM reports WHERE status='approved' AND username='$user'  ORDER BY date_reg ASC";
                    $result = mysqli_query($connect, $query);
                    $output1 = "";
                    if(mysqli_num_rows($result)>0){
                        $output1 .= "
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Username</th>
                                    <th>Date & Time</th>
                                </tr>";
                        if (mysqli_num_rows($result) < 1) {
                            $output1 .= "<tr>
                                <th colspan='8'>There are no job requests yet.</th>
                            </tr>";
                        }
                        while ($row = mysqli_fetch_array($result)) {
                            $output1 .= "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['title'] . "</td>
                                <td>" . $row['message'] . "</td>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['date_reg'] . "</td>
                            </tr>";
                        }
                        $output1 .= "
                            </table>
                        </div>
                        ";
                    }
                    else{
                        $output1 .= "<tr>
                            <th colspan='6'>There are no reports yet.</th>
                        </tr>";
                    }
                    echo $output1;
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

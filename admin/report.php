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
                <h4 class="my-2">Reports Details</h4>
                <div id="show">
                    <?php
                    $query = "SELECT * FROM reports WHERE status='pending' ORDER BY date_reg ASC";
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
                                    <th>Approve</th>
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
                                <td><a href='solved_report.php?id=" . $row['id'] . "'><button class='btn btn-success approve'>Solved?</button></td></a>
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
                </div>
            </div>
        </div>
    </div>
</body>
</html>

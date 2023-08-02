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
                    $query = "SELECT * FROM patients ORDER BY date_reg ASC";
                    $result = mysqli_query($connect, $query);
                    $output = "";
                    if(mysqli_num_rows($result)>0){
                        $output .= "
                        <div class='table-responsive'>
                            <table class='table table-bordered'>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Username</th>
                                    <th>Date & Time</th>
                                </tr>";
                        while ($row = mysqli_fetch_array($result)) {
                            $output .= "<tr>
                                <td>" . $row['id'] . "</td>
                                <td>" . $row['name'] . "</td>
                                <td>" . $row['email'] . "</td>
                                <td>" . $row['phone'] . "</td>
                                <td>" . $row['gender'] . "</td>
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

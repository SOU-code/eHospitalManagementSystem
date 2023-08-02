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
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="my-2">Reports Details</h4>
                        <div id="show">
                            <?php
                            $user=$_SESSION['patient'];
                            $query = "SELECT *
                            FROM appointment
                            WHERE username='$user' ORDER BY status ASC ";
                            $result = mysqli_query($connect, $query);
                            $output = "";
                            if(mysqli_num_rows($result)>0){
                                $output .= "
                                <div class='table-responsive'>
                                    <table class='table table-bordered'>
                                        <tr>
                                            <th>Book Date</th>
                                            <th>Symptoms</th>
                                            <th>Status</th>
                                        </tr>";
                                while ($row = mysqli_fetch_array($result)) {
                                    $output .= "<tr>
                                        <td>" . $row['book_date'] . "</td>
                                        <td>" . $row['symptoms'] . "</td>
                                        <td>" . $row['status'] . "</td>
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
                    <div class="col-md-4">
                    <h4 class="my-2">Message</h4>
                    <?php
                    $bk="SELECT * FROM booked_appointments WHERE patient_username='$user'";
                    $bk_result=mysqli_query($connect,$bk);
                    $bk_row=mysqli_fetch_array($bk_result);
                    if(empty($bk_row)){
                        echo "No Messages";
                    }
                    else{
                        echo $bk_row['message'] ;
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

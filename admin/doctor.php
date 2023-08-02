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
                <h4 class="my-2">Doctors Details</h4>
                <div id="show"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function () {
        show();
        function show() {
            $.ajax({
                url: "ajax_doctor.php",
                method: "POST",
                success: function (data) { // Add 'data' parameter here
                    $('#show').html(data);
                },
                error: function (error) {
                    console.log(error); // Optionally, handle the error if any
                }
            });
        }
    });
    </script>
</body>
</html>

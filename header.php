<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/ecd6c1b7a4.js" crossorigin="anonymous"></script>  
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            color: #fff;
            font-size: 20px;
        }
        .navbar-toggler {
            border: none;
        }
        .navbar-toggler-icon {
            color: #fff;
        }
        .navbar-nav {
            margin-right: 10px;
        }
        .nav-link {
            color: #fff;
            font-size: 18px;
        }
        .nav-link i {
            margin-right: 5px;
        }

        /* Media queries for responsiveness */
        @media (max-width: 767px) {
            .navbar-nav {
                margin-right: 0;
            }
            .nav-link {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <!-- Brand -->
        <a class="navbar-brand" href="index.php">Hospital Management System</a>
        <!-- Toggler/collapsible Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ml-auto">
                <?php
                        echo '
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminlogin.php"><i class="fas fa-user-shield"></i> Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctorlogin.php"><i class="fas fa-user-md"></i> Doctor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patientlogin.php
                            "><i class="fas fa-user"></i> Patient</a>
                        </li>';
                ?>
            </ul>
        </div>
    </nav>
</body>
</html>
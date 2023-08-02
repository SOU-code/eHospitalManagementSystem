<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .feature-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .feature-card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .feature-card h5 {
            text-align: center;
            margin-bottom: 15px;
        }
        .feature-card a {
            display: block;
            text-align: center;
            margin: 0 auto;
            max-width: 200px;
        }
        .feature-card a .btn {
            width: 100%;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .feature-card a .btn:hover {
            background-color: #007bff;
        }
         .grid-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
        }
        .card {
            background-color: #f5f5f5;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .number {
            font-size: 24px;
            font-weight: bold;
        }
        .label {
            font-size: 14px;
        }
        .highlight {
            color: #007bff;
        }
        @media (min-width: 576px) {
            .grid-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 768px) {
            .grid-container {
                grid-template-columns: repeat(3, 1fr);
            }
            .feature-card {
                margin-bottom: 30px;
            }
        }
    </style>
</head>
<body>
    <?php
        include("./header.php");
    ?>
    <div class="container">
        <div class="col-md-12" style="margin-top:50px"></div>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-card shadow">
                    <img src="./img/patient.jpg" alt="Create Account">
                    <h5>Create Account so we can take care of you.</h5>
                    <a href="account.php"><button class="btn btn-success">Create Account</button></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card shadow">
                    <img src="./img/more.jpg" alt="More Information">
                    <h5>Click On the button for more information.</h5>
                    <a href="#"><button class="btn btn-success">More Information</button></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card shadow">
                    <img src="./img/doctor.jpg" alt="Apply Now">
                    <h5>We are employing for doctors, Check Now</h5>
                    <a href="apply.php"><button class="btn btn-success">Apply Now</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-12" style="margin-top:20px">
        <p>Established by Dr Prathap C Reddy in 2023, HSM Healthcare has a robust presence across the healthcare ecosystem. From routine wellness & preventive health care to innovative life-saving treatments and diagnostic services, Apollo Hospitals has touched more than 200 million lives from over 120 countries.</p>
            <div class="grid-container">
                <div class="card">
                    <div class="number">73+</div>
                    <div class="label">Largest private healthcare network of Hospitals</div>
                </div>
                <div class="card">
                    <div class="number">400+</div>
                    <div class="label">Largest private network of clinics across India</div>
                </div>
                <div class="card">
                    <div class="number">1,100+</div>
                    <div class="label">Diagnostic centres across India</div>
                </div>
                <div class="card">
                    <div class="number">5,000+</div>
                    <div class="label">Pharmacies</div>
                </div>
                <div class="card">
                    <div class="number">10,000+</div>
                    <div class="label">Pin codes Served across India</div>
                </div>
                <div class="card">
                    <div class="number">11,000+</div>
                    <div class="label">Doctors</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <p>© 2023 HMS. All rights reserved.</p>
    </footer>
</body>
</html>
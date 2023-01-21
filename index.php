<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Pages</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("includes/globalLib_Top.php"); ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        a
        {
            text-decoration: none;
            color: #000;
        }
        li:hover
        {
            background: #1E4620;
        }
        li:hover>a
        {
            color: #FFF;
        }
    </style>
</head>

<body class="dark_green_bg">
    <div class="container mt-3">
        <div class="text-center">
            <h3 id="page_title">Student Pages</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-4 mx-auto text-center">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><a href="student-login.php">Student Login</a></li>
                            <li class="list-group-item"><a href="student-registration-verification.php">Student Registration Verification</a></li>
                            <li class="list-group-item"><a href="student-registration-form.php">Student Registration Form</a></li>
                            <li class="list-group-item"><a href="student-profile.php">Student Profile</a></li>
                            <li class="list-group-item"><a href="student-placement-offers.php">Student Placement Offers</a></li>
                            <li class="list-group-item"><a href="student-work-experience.php">Student Work Experience</a></li>
                            <li class="list-group-item"><a href="student-payment-report.php">Student Payment Report</a></li>
                            <li class="list-group-item"><a href="student-exam-report.php">Student Exam Report</a></li>
                            <li class="list-group-item"><a href="student-annoucement.php">Student Annoucement</a></li>
                            <li class="list-group-item"><a href="student-processing.php">Student Processing</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
</body>

</html>

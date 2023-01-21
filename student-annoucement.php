<?php
    session_start();
    if(!isset($_SESSION['user_enroll']) && !isset($_SESSION['status']))
    {
        header("Location:student-login.php");
    }
    require 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Announcement</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
   <?php require("includes/navbar.php"); ?>
    <div class="container mt-3">
        <div class="text-center">
            <h3 id="page_title">Announcement</h3>
        </div>
        <div class="card mt-2">
            <div class="row g-0">
                <div class="col-md-2 company_image_box">
                    <img src="img/tcs.png" class="img-fluid rounded-start" alt="..." width="100%">
                </div>
                <div class="col-md-10">
                    <div class="card-body company_info_box">
                        <label>Subject:</label>
                        <h5 class="card-title">Subject to be Added</h5>
                        <label>Company Description:</label>
                        <p class="card-text">Tata Consultancy Services (TCS) is a software and services provider in India. It is part of the Tata Group, which oversees operations for over 100 companies in seven business sectors: communications and information technology, engineering, materials, services, energy, consumer products and chemicals.</p>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Document:</label>
                                <p class="card-text"><a href="https://learning.tcsionhub.in/hub/national-qualifier-test/">View Document</a></p>
                            </div>
                            <div class="col-md-6">
                                <label for="">Links:</label>
                                <p class="card-text"><a href="https://learning.tcsionhub.in/hub/national-qualifier-test/">https://learning.tcsionhub.in/hub/national-qualifier-test/</a></p>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label for="">Annoucement Date:</label>
                                <p class="card-text">15<sup>th</sup> September 2022</p>
                            </div>
                        </div>
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

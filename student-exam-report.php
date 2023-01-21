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
    <title>Semester Report</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
   <?php require("includes/navbar.php"); ?>
    <div class="container mt-3" id="exam_report_box">
        <div class="text-center">
            <h3 id="page_title">Semester Report</h3>
        </div>
        <h4 class="section_title">Reports</h4>
        <div class="card mt-3 p-3 text-center">
            <div class="row g-0 exam_sem_box">
                <div class="col-md-2">
                    <label>Semester:</label>
                    <p>SEM VII</p>
                </div>
                <div class="col-md-2">
                    <label>Batch:</label>
                    <p>2018-2022</p>
                </div>
                <div class="col-md-2">
                    <label>Exam:</label>
                    <p>Dec-21</p>
                </div>
                <div class="col-md-2">
                    <label>Start Date:</label>
                    <p>12<sup>th</sup> July 2021</p>
                </div>
                <div class="col-md-2">
                    <label>End Date:</label>
                    <p>30<sup>th</sup> October 2021</p>
                </div>
                <div class="col-md-2  exam_border_right">
                    <label>Status:</label>
                    <p>Passed</p>
                </div>
                <div class="col-md-12  exam_border_right subject_marks py-0">
                    <div class="row text-center">
                        <div class="col-md-12 py-2">
                            <h4>Subject Marks</h4>
                        </div>
                        <div class="col-md-3">
                            <p>Digital Signal and Image Processing</p>
                            <p>70/100</p>
                        </div>
                        <div class="col-md-3">
                            <p>Digital Signal and Image Processing</p>
                            <p>70/100</p>
                        </div>
                        <div class="col-md-3">
                            <p>Digital Signal and Image Processing</p>
                            <p>70/100</p>
                        </div>
                        <div class="col-md-3">
                            <p>Digital Signal and Image Processing</p>
                            <p>70/100</p>
                        </div>
                        <div class="col-md-3">
                            <p>Digital Signal and Image Processing</p>
                            <p>70/100</p>
                        </div>
                        <div class="col-md-3">
                            <p>Digital Signal and Image Processing</p>
                            <p>70/100</p>
                        </div>
                        <div class="col-md-3 fake_report_box">
                        </div>
                        <div class="col-md-3 fake_report_box">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 exam_border_bottom">
                    <label>Total Marks:</label>
                    <p>480/750</p>
                </div>
                <div class="col-md-2 exam_border_bottom">
                    <label>Credits:</label>
                    <p>27</p>
                </div>
                <div class="col-md-2 exam_border_bottom">
                    <label>SGPA:</label>
                    <p>7.8</p>
                </div>
                <div class="col-md-2 exam_border_bottom report_link">
                    <p><a href="#">View Internal Report</a></p>
                </div>
                <div class="col-md-2 exam_border_bottom report_link">
                    <p><a href="#">View Gazatte</a></p>
                </div>
                <div class="col-md-2 exam_border_right exam_border_bottom report_link">
                    <p><a href="#">View Marksheet</a></p>
                </div>
            </div>
        </div>
        <div class="card mt-3 p-3 text-center">
            <div class="row">
                <div class="col-md-12">
                    <h4 id="report_enquire_text">For any changes to your provided result please convey <a href="#" id="report_enquire_link">through here.</a></h4>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
        require("includes/FormLib.php");
    ?>
</body>

</html>

<?php
    session_start();
    if(!isset($_SESSION['user_mode']) && !isset($_SESSION['user_id']))
    {
        header("Location:admin-login.php");
    }
    require '../../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Placements</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
       <div class="manage-box manage_bg">
        <h3 class="text-center">Student Placements</h3>
        <table id="student_placement_table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Sr.No</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Company Logo</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Company Description</th>
                    <th scope="col">Role</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col" class='notexport'>Actions</th>
                </tr>
            </thead>
        </table>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>
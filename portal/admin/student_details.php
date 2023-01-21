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
    <title>Student Details</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Student Details</h2>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Student Data</h3>
            <table id="students_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Branch</th>
                        <th scope="col">Year</th>
                        <th scope="col">Sem</th>
                        <th scope="col">Batch</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>

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
    <title>Confirmed Students</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Confirmed Students</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addConfirmedStudent_form">
            <h3 class="text-center mb-3">Add New Student</h3>
            <div class="mb-3 text-center addition_form_elements">
                <div class="row">
                    <div class="col-md-4">
                        <label for="confirmedStudentCapId">Student CAP Id:</label>
                        <input type="text" class="form-control" id="confirmedStudentCapId" name="confirmedStudentCapId">
                    </div>
                    <div class="col-md-4">
                        <label for="confirmedStudentName">Student Name:</label>
                        <input type="text" class="form-control" id="confirmedStudentName" name="confirmedStudentName">
                    </div>
                    <div class="col-md-4"><label for="confirmedStudentEmail">Student Email:</label>
                        <input type="text" class="form-control" id="confirmedStudentEmail" name="confirmedStudentEmail">
                    </div>
                </div>
                <button type="submit" name="confirmedStudent_btn" class="btn btn-primary mt-3 d-block" id="confirmedStudent_btn" value="confirmedStudent_btn">Add Student</button>
            </div>
        </form>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addConfirmedStudentSheet_form">
            <h3 class="text-center mb-3">Add New Students</h3>
            <div class="mb-3 text-center addition_form_elements">
                <label for="confirmedStudentSheet">Students Sheet:</label>
                <input type="file" class="form-control" id="confirmedStudentSheet" name="confirmedStudentSheet">
                <button type="submit" name="confirmedStudent_btn" class="btn btn-primary mt-3 d-block" id="confirmedStudentSheet_btn" value="confirmedStudentSheet_btn">Add Students</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Students</h3>
            <table id="confirmedStudent_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">Cap Id</th>
                        <th scope="col">Enrollment No</th>
                        <th scope="col">Student Email</th>
                        <th scope="col" class='notexport'>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal EditModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamic-modal-content">
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>

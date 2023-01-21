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
    <title>Departments</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Departments</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addDepartment_form">
            <h3 class="text-center mb-3">Add New Department</h3>
            <div class="mb-3 text-center addition_form_elements">
                <div class="row">
                    <div class="col-md-4">
                        <label for="department_name">Department Name</label>
                        <input type="text" class="form-control" id="department_name" name="department_name">
                    </div>
                    <div class="col-md-4">
                        <label for="department_code">Department Code</label>
                        <input type="text" class="form-control" id="department_code" name="department_code">
                    </div>
                    <div class="col-md-4">
                        <label for="department_short">Department Shortform</label>
                        <input type="text" class="form-control" id="department_short" name="department_short">
                    </div>
                </div>
                <button type="submit" name="addDepartment_btn" class="btn btn-primary mt-3 d-block" id="addDepartment_btn" value="addDepartment">Add Department</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Departments</h3>
            <table id="department_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Department Code</th>
                        <th scope="col">Department Short</th>
                        <th scope="col" class='notexport'>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal EditModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Department</h5>
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

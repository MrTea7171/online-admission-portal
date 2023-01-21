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
    <title>Registered Students</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Registered Students</h2>
        <!--
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addDepartment_form">
            <h3 class="text-center mb-3">Add New Department</h3>
            <div class="mb-3 text-center addition_form_elements">
                <label for="addDepartment">Department Name</label>
                <input type="text" class="form-control" id="addDepartment" name="addDepartment">
                <button type="submit" name="addDepartment_btn" class="btn btn-primary mt-3 d-block" id="addDepartment_btn" value="addDepartment">Add Department</button>
            </div>
        </form>
-->
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">View Students</h3>
            <table id="registered_students_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Admission Mode</th>
                        <th scope="col">Caste</th>
                        <th scope="col">Admission Status</th>
                        <th scope="col" class='notexport'>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!--
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
-->
    <div class="modal fade ReviewModal" id="reviewbox" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="status_form">
                    
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
    <script>
        $(document).on("click", ".profile_view_btn", function() {
            let student_id = $(this).attr("id");

            $.ajax({
                url: "../includes/session_setter.php",
                type: "post",
                data: {
                    student_profile_view: true,
                    student: student_id
                },
                success: function(response) {
                    //console.log(response);
                    let url = "Student-Profile.php";
                    window.open(url, '_blank').focus();
                }
            });
        });

    </script>
</body>

</html>

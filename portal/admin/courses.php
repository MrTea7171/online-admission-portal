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
    <title>Courses</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Course</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addCourse_form">
            <h3 class="text-center mb-3">Add New Course</h3>
            <div class="mb-3 text-center addition_form_elements">
                <div class="row">
                    <div class="col-md-4">
                        <label for="course_class">Course Class</label>
                        <select class="form-control course_class" id="course_class" name="course_class">
                            <option value="" selected disabled>---Select Class---</option>
                            <?php
                                    $stmt = $conn->prepare( "select * from classes" );
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '<option value="'.$row["class_id"].'">'.$row["class_name"].'</option>';
                                    }
                                    $stmt->close();
                                ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="course_faculty">Course Faculty</label>
                        <select class="form-control course_faculty" id="course_faculty" name="course_faculty">
                            <option value="" selected disabled>---Select Faculty---</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="course_subject">Course Subject</label>
                        <select class="form-control course_subject" id="course_subject" name="course_subject">
                            <option value="" selected disabled>---Select Subject---</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="addCourse_btn" class="btn btn-primary mt-3 d-block" id="addCourse_btn" value="addCourse">Add Course</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Course</h3>
            <table id="course_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Course Class</th>
                        <th scope="col">Course Faculty</th>
                        <th scope="col">Course Subject</th>
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
                    <h5 class="modal-title">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamic-modal-content">
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
    <script>
        $(document).on('change','.course_class',function() {
            let course = $(this).val();
            let form=$(this).closest('form');
            $.ajax({
                url: "../includes/coursedetails.php",
                method: "post",
                data: {
                    loadFaculty: "loadFaculty",
                    BranchId: course
                },
                success: function(response) {
                    $(form).find(".course_faculty").html(response);
                }
            });
            $.ajax({
                url: "../includes/coursedetails.php",
                method: "post",
                data: {
                    loadSubjects: "loadSubjects",
                    BranchId: course
                },
                success: function(response) {
                     $(form).find(".course_subject").html(response);
                }
            });
        });

    </script>
</body>

</html>

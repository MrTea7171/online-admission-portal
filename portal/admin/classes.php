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
    <title>Classes</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Classes</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addClasses_form">
            <h3 class="text-center mb-3">Add New Class</h3>
            <div class="mb-3 text-center addition_form_elements">
                <div class="row text-center">
                    <div class="col-md-6">
                        <label for="class_branch">Class Branch</label>
                        <select class="form-control class_branch" id="class_branch" name="class_branch">
                            <option value="" selected disabled>---Select Department---</option>
                            <?php
                                    $stmt = $conn->prepare( "select * from student_department" );
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '<option value="'.$row["department_id"].'" id="'.$row["department_short"].'">'.$row["department_name"].'</option>';
                                    }
                                    $stmt->close();
                                ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="class_batch">Class Batch</label>
                        <input type="text" class="form-control class_batch" id="class_batch" name="class_batch">
                    </div>
                    <div class="col-md-6">
                        <label for="class_year">Class Year</label>
                        <select class="form-control class_year" id="class_year" name="class_year">
                            <option value="" selected disabled>---Select Year---</option>
                            <option value="FE">FE</option>
                            <option value="SE">SE</option>
                            <option value="TE">TE</option>
                            <option value="BE">BE</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="class_sem">Class Sem</label>
                        <select class="form-control" id="class_sem" name="class_sem">
                            <option value="" selected disabled>---Select Semester---</option>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                            <option value="IV">IV</option>
                            <option value="V">V</option>
                            <option value="VI">VI</option>
                            <option value="VII">VII</option>
                            <option value="VIII">VIII</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="class_name">Class Name</label>
                        <input type="text" class="form-control class_name" id="class_name" name="class_name" readonly>
                    </div>
                </div>
                <button type="submit" name="addClasses_btn" class="btn btn-primary mt-3 d-block" id="addClasses_btn" value="addClasses">Add Class</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Classes</h3>
            <table id="class_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Classes Name</th>
                        <th scope="col">Classes Branch</th>
                        <th scope="col">Classes Batch</th>
                        <th scope="col">Classes Year</th>
                        <th scope="col">Classes Sem</th>
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
                    <h5 class="modal-title">Edit Classes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamic-modal-content">
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
    <script>
        let class_name="";
        let class_branch="";
        let class_year="";
        let class_batch="";
        $(document).on('change', '.class_branch', function() {
            let form = $(this).closest('form');
            class_branch=$(this).children(":selected").attr('id');
            class_name=class_branch+" "+class_year+" "+class_batch;
            $(form).find('.class_name').val(class_name);
        });
        $(document).on('change', '.class_batch', function() {
            console.log("working");
            let form = $(this).closest('form');
            class_batch=$(this).val();
            class_name=class_branch+" "+class_year+" "+class_batch;
            $(form).find('.class_name').val(class_name);
        });
        $(document).on('change', '.class_year', function() {
            let form = $(this).closest('form');
            class_year=$(this).val();
            class_name=class_branch+" "+class_year+" "+class_batch;
            $(form).find('.class_name').val(class_name);
        });
    </script>
</body>

</html>

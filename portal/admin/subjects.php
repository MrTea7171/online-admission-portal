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
    <title>Subjects</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Subjects</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addSubject_form">
            <h3 class="text-center mb-3">Add New Subject</h3>
            <div class="mb-3 text-center addition_form_elements">
                <div class="row">
                    <div class="col-md-6">
                        <label for="addSubjects">Subject Name</label>
                        <input type="text" class="form-control" id="subject_name" name="subject_name">
                    </div>
                    <div class="col-md-6">
                        <label for="addSubjects">Subjects Branch</label>
                        <select class="form-control" id="subject_branch" name="subject_branch">
                            <option value="" selected disabled>---Select Branch---</option>
                            <?php
                        $stmt = $conn->prepare( "select * from student_department" );
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($row = $result->fetch_assoc())
                        {
                            echo '<option value="'.$row["department_id"].'">'.$row["department_name"].'</option>';
                        }
                        $stmt->close();
                    ?>
                        </select>
                    </div>
                </div>
                <button type="submit" name="addSubject_btn" class="btn btn-primary mt-3 d-block" id="addSubject_btn" value="addSubjects">Add Subject</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Subjects</h3>
            <table id="subject_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Subject Name</th>
                        <th scope="col">Subject Branch</th>
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
                    <h5 class="modal-title">Edit Subjects</h5>
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

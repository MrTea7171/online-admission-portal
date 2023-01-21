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
    <title>Facultys</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Faculty</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addFaculty_form">
            <h3 class="text-center mb-3">Add New Faculty</h3>
            <div class="mb-3 text-center addition_form_elements">
                <label for="addFaculty">Faculty Name</label>
                <input type="text" class="form-control" id="faculty_name" name="faculty_name">
                <div class="row">
                    <div class="col-md-6">
                        <label for="addFaculty">Faculty Email</label>
                        <input type="text" class="form-control" id="faculty_email" name="faculty_email">
                    </div>
                    <div class="col-md-6">
                        <label for="addFaculty">Faculty Password</label>
                        <input type="password" class="form-control" id="faculty_password" name="faculty_password">
                    </div>
                    <div class="col-md-6">
                        <label for="addFaculty">Faculty Branch</label>
                        <select class="form-control" id="faculty_branch" name="faculty_branch">
                        <option value="" selected disabled>---Select Department---</option>
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
                    <div class="col-md-6">
                        <label for="addFaculty">Faculty Phone</label>
                        <input type="text" class="form-control" id="faculty_phone" name="faculty_phone">
                    </div>
                    <div class="col-md-12 mt-2">
                        <label for="addFaculty">Faculty Roles</label>
                        <div class="row">
                        <?php
                            $stmt = $conn->prepare( "select * from roles" );
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $i=0;
                            while($row = $result->fetch_assoc())
                            {
                                ?>
                                
                                    <div class="col-md-4">
                                        <input type="checkbox" value="<?php echo $row['role_id']; ?>" name="faculty_roles[]" id="role<?php echo $i; ?>">
                                        <label for="role<?php echo $i; ?>"><?php echo $row['role_name']; ?></label>
                                    </div>
                                <?php
                                $i++;
                            }
                            $stmt->close();
                        ?>
                        </div>
                    </div>
                </div>
                <button type="submit" name="addFaculty_btn" class="btn btn-primary mt-3 d-block" id="addFaculty_btn" value="addFaculty">Add Faculty</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Faculty</h3>
            <table id="faculty_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Faculty Name</th>
                        <th scope="col">Faculty Email</th>
                        <th scope="col">Faculty Branch</th>
                        <th scope="col">Faculty Phone</th>
                        <th scope="col">Faculty Roles</th>
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
                    <h5 class="modal-title">Edit Faculty</h5>
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

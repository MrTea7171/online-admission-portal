<?php
    session_start();
    if(!isset($_SESSION['user_mode']) && !isset($_SESSION['user_id']))
    {
        header("Location:faculty-login.php");
    }
    require '../../includes/connection.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $faculty_id=$_SESSION['user_id'];
    $stmt = $conn->prepare( "select * from faculty f inner join student_department sd on f.faculty_branch=sd.department_id where f.faculty_email_id=?");
    $stmt->bind_param('s',$faculty_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Faculty Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
    <link rel="stylesheet" href="../../css/style.css">
    <style>
        .card-image>img {
            display: block;
            margin: 0px auto;
            border: 2px solid black;
        }
        
    </style>
</head>

<body class="dark_green_bg">
   <?php require("../includes/navbar.php"); ?>
    <div class="container mt-3">
        <div class="text-center">
            <h3 id="page_title">Account Details</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4 ">Account Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name:</td>
                                    <td><?php echo $row['faculty_name']; ?></td>
                                    <td>Branch:</td>
                                    <td><?php echo $row['department_name'];?></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $row['faculty_email_id']; ?></td>
                                    <td>Phone:</td>
                                    <td>+91-<?php echo $row['faculty_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><a href="#">Change Password</a></td>
                                    <td colspan="2"><a href="#">Logout</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="update_request_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Request for Information Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Request Message:</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Document Changes:</label>
                            <input type="file" class="form-control" id="lastname" name="lastname" multiple>
                        </div>
                        <button type="submit" name="register_student_btn" id="register_student_btn" class="btn btn-success w-100" value="register_student">Submit Request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>

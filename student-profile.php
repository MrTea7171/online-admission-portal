<?php
    session_start();
    if(!isset($_SESSION['user_enroll']) && !isset($_SESSION['status']))
    {
        header("Location:student-login.php");
    }
    require 'includes/connection.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date("Y", strtotime("-6 months"));
    function batch($course_year,$date)
    {
        if($course_year=="FE")
        {
            return $date+4;
        }
        else if($course_year=="SE")
        {
            return $date+3;
        }
        else if($course_year=="TE")
        {
            return $date+2;
        }
        else if($course_year=="BE")
        {
            return $date+1;
        }
    }

    $enroll=$_SESSION['user_enroll'];
    $stmt = $conn->prepare( "select * from student_personal sp inner join student_college_details scd on sp.student_id=scd.student_id inner join student_status ss on sp.student_id=ss.student_id inner join student_department sd on sd.department_id=scd.student_department where sp.enrollment_no=?" );
    $stmt->bind_param('s',$enroll);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("includes/globalLib_Top.php"); ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card-image>img {
            display: block;
            margin: 0px auto;
            border: 2px solid black;
        }
        
    </style>
</head>

<body class="dark_green_bg">
   <?php require("includes/navbar.php"); ?>
    <div class="container mt-3">
        <div class="text-center">
            <h3 id="page_title">Student Profile</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <div class="card pt-4">
                    <div class="card-image">
                        <img src="student_data/<?php echo $row['student_passport_pic']; ?>" height="180px" alt="...">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo $row['student_fname']; ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Year: <?php echo $row['course_year']; ?></b></li>
                            <li class="list-group-item"><b>Sem: <?php echo $row['sem']; ?></b></li>
                            <li class="list-group-item"><b>Department: <?php echo $row['department_name']; ?></b></li>
                            <li class="list-group-item"><b>Batch: <?php echo $row['student_admission_year']."-".batch($row['course_year'],$date); ?></b></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="4 ">Profile Information</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>IEN Number:</td>
                                    <td><?php echo $row['student_ien']; ?></td>
                                    <td>Admission Year:</td>
                                    <td><?php echo $row['student_admission_year']; ?> <?php echo $row['student_admission_to']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td><?php echo $row['student_email']; ?></td>
                                    <td>Phone:</td>
                                    <td>+<?php echo $row['student_phone']; ?></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth:</td>
                                    <td>
                                    <?php
                                        $date=date_create($row['student_dob']);
                                        echo date_format($date,"j<\s\up>S</\s\up> F Y");
                                    ?>
                                    </td>
                                    <td>Age:</td>
                                    <td>
                                    <?php 
                                        echo date_diff(date_create($row['student_dob']), date_create('today'))->y;
                                    ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td><?php echo $row['student_gender'];?></td>
                                    <td>Caste:</td>
                                    <td><?php echo $row['student_caste'];?></td>
                                </tr>
                                <tr>
                                    <td>Current Address:</td>
                                    <td><?php echo $row['student_caddress'];?></td>
                                    <td>Permanent Address:</td>
                                    <td><?php echo $row['student_paddress'];?></td>
                                </tr>
                                <tr>
                                    <td>Virtual ID:</td>
                                    <td><a href="student_id.php">Click Here</a></td>
                                    <td>Request For Update:</td>
                                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#update_request_box">Click Here</a></td>
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
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
</body>

</html>

<?php
    session_start();
    if(!isset($_SESSION['user_mode']) && !isset($_SESSION['user_id']))
    {
        header("Location:faculty-login.php");
    }
    require '../../includes/connection.php';
    $faculty_id=$_SESSION['user_id'];
    $stmt = $conn->prepare( "select * from courses c inner join classes cl on c.course_class=cl.class_id inner join student_department sd on cl.class_branch=sd.department_id inner join faculty f on c.course_faculty=f.faculty_id inner join subjects s on s.subject_id=c.course_subject where f.faculty_email_id=? order by c.course_id desc" );
    $stmt->bind_param("s", $faculty_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $count=$result->num_rows;
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Faculty Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="dark_green_bg">
    <?php require("../includes/navbar.php"); ?>
    <div class="container mt-3" id="payment_record_box">
        <div class="text-center">
            <h3 id="page_title">Course Details</h3>
        </div>
        <h4 class="section_title">My Courses</h4>
        <?php
            if($count > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
        ?>
        <div class="card mt-3 p-3">
            <div class="row g-0">
                <div class="col-md-2 payment_sem_title">
                    <h2><?php echo $row['class_year']; ?></h2>
                    <h4><?php echo $row['class_batch']; ?></h4>
                </div>
                <div class="col-md-8 payment_detail_box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Subject:</label>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-inline-block ml-3">
                                       <?php 
                                            echo $row['subject_name'];
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Semester:</label>
                                </div>
                                <div class="col-md-6">
                                    <span><?php echo $row['class_sem']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Branch:</label>
                                </div>
                                <div class="col-md-6">
                                    <span><?php echo $row['department_name']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 payment_sem_title ">
                        <h3><a href="fee_receipt.php?pstatus=<?php echo $row['pstatus_id']; ?>" class="d-block plain">View Syllabus</a></h3>
                </div>
            </div>
        </div>
        <?php
                }
            }
            else{
        ?>
        <div class="card mt-3 p-3 text-center">
            <div class="row">
                <div class="col-md-12">
                    <h4 id="report_enquire_text">No Courses Assigned.</h4>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>

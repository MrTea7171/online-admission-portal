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
    <title>Faculty Attendance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="dark_green_bg">
    <?php require("../includes/navbar.php"); ?>
    <div class="container mt-3" id="payment_record_box">
        <?php 
            if($count > 0) 
            {
        ?>
        <div class="text-center">
            <h3 id="page_title">Attendance Details</h3>
        </div>
        <h4 class="section_title">Add Attendance</h4>
        <div class="card mt-3 p-3">
            <form id="student_attendance_form">
               <input type="hidden" name="add_attendance" value="add_attendance">
                <div class="row">
                    <div class="col-md-3">
                        <label for="" class="form-label">Course</label>
                        <select class="form-control course_list" name="course_list" id="course_list">
                            <option value="" selected disabled>---Select Course---</option>
                            <?php
                                while($row = $result->fetch_assoc()) 
                                {
                            ?>
                                <option value="<?php echo $row['course_id']; ?>">
                                <?php echo $row['subject_name'].' ('.$row['class_name'].')'; ?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="date_attended" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date_attended" name="date_attended">
                    </div>
                    <div class="col-md-3">
                        <label for="start_time" class="form-label">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name="start_time">
                    </div>
                    <div class="col-md-3">
                        <label for="end_time" class="form-label">End Time</label>
                        <input type="time" class="form-control" id="end_time" name="end_time">
                    </div>
                    <div class="col-md-12" id="student_list">
                    </div>
                </div>
            </form>
        </div>
        <?php
            }
        ?>
    </div>
    <?php require("../includes/globalJS.php");?>
    <script>
        $(document).on('change','.course_list',function() {
            let course = $(this).val();
            let form=$(this).closest('form');
            $.ajax({
                url: "../includes/coursedetails.php",
                method: "post",
                data: {
                    loadStudents: "loadStudents",
                    CourseId: course
                },
                success: function(response) {
                    $(form).find("#student_list").html(response);
                }
            });
        });

    </script>
</body>

</html>

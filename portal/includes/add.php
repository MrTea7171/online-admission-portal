<?php
require '../../includes/connection.php';
date_default_timezone_set( 'Asia/Kolkata' );
$date = date( "Y-m-d H:i:s" );

if ( isset( $_POST["addDepartment_btn"] ) ) {
    $department_name = $_POST['department_name'];
    $department_code = $_POST['department_code'];
    $department_short = $_POST['department_short'];
    $stmt1 = $conn->prepare( "insert into student_department(department_name, department_code, department_short, date_added) values (?,?,?,?)" );
    $stmt1->bind_param( "ssss", $department_name, $department_code, $department_short, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["addCpoOffers_btn"] ) ) {
    $cpo_name = $_POST['cpo_name'];
    $cpo_description = $_POST['cpo_description'];
    $cpo_role = $_POST['cpo_role'];
    $cpo_salary = $_POST['cpo_salary'];
    $cpo_link = $_POST['cpo_link'];
    $cpo_ldate = $_POST['cpo_ldate'];
    $cpo_logo = "";
    $file_path = "../img/companies/";
    if ( !file_exists( $file_path ) )  {
        mkdir( $file_path, 0777, true );
    }
    if ( isset( $_FILES['cpo_logo'] ) )  {
        $ext = explode( '.', basename( $_FILES['cpo_logo']['name'] ) );
        $file_extension = end( $ext );
        $file_name = strtotime( $date ).".".$file_extension;
        move_uploaded_file( $_FILES['cpo_logo']['tmp_name'], $file_path.$file_name );
        $cpo_logo = "companies/".$file_name;
    }
    $stmt1 = $conn->prepare( "insert into college_placement_offers(cpo_logo, cpo_name, cpo_description, cpo_role, cpo_salary, cpo_link, cpo_ldate, cpo_date_added) values (?,?,?,?,?,?,?,?)" );
    $stmt1->bind_param( "ssssssss", $cpo_logo, $cpo_name, $cpo_description, $cpo_role, $cpo_salary, $cpo_link, $cpo_ldate, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["confirmedStudent_btn"] ) ) {
    $studentCapId = $_POST['confirmedStudentCapId'];
    $studentName = $_POST['confirmedStudentName'];
    $studentEmail = $_POST['confirmedStudentEmail'];
    $year = date( "Y" );
    $stmt = $conn->prepare( "select substr(enrollment_id, -3) from student_confirm where year(date_added)>=? order by confirm_id desc limit 1" );
    $stmt->bind_param( 's', $year );
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_row();
    $stmt->close();
    if ( !isset( $row[0] ) ) {
        $row[0] = 0;
    }
    $confirm_total = str_pad( $row[0]+1, 4, "0", STR_PAD_LEFT );
    $enrollment_id = "NHITM".date( 'y' ).$confirm_total;
    $stmt1 = $conn->prepare( "insert into student_confirm(student_name, cap_id, enrollment_id, email_id, date_added) values (?,?,?,?,?)" );
    $stmt1->bind_param( "sssss", $studentName, $studentCapId, $enrollment_id, $studentEmail, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}
if ( isset( $_POST["addFeeDetailsBtn"] ) ) {
    $batch = $_POST['batch'];
    $year = $_POST['year'];
    $caste = $_POST['caste'];
    $tution_fees = $_POST['tution_fees'];
    $development_fees = $_POST['development_fees'];
    $other_fees = $_POST['other_fees'];
    $caution_money = $_POST['caution_money'];
    $enrollment_fees = $_POST['enrollment_fees'];
    $form_fees = $_POST['form_fees'];
    $sports_fees = $_POST['sports_fees'];
    $cultural_fees = $_POST['cultural_fees'];
    $relief_fund = $_POST['relief_fund'];
    $gymkhana_fees = $_POST['gymkhana_fees'];
    $e_charges = $_POST['e_charges'];
    $yuvia_fees = $_POST['yuvia_fees'];
    $others = $_POST['others'];
    $total_fees = $_POST['total_fees'];
    $stmt1 = $conn->prepare( "insert into student_fees(batch, year, caste, tution_fee, development_fee, other_fees, caution_money, enrollment_fees, form_fees, sports_fees, cultural_fees, relief_fund, gym_fees, e_charges, yuvia_fees, others, total_fees, date_created) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );
    $stmt1->bind_param( "ssssssssssssssssss", $batch, $year, $caste, $tution_fees, $development_fees, $other_fees, $caution_money, $enrollment_fees, $form_fees, $sports_fees, $cultural_fees, $relief_fund, $gymkhana_fees, $e_charges, $yuvia_fees, $others, $total_fees, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["addFaculty_btn"] ) ) {
    $faculty_name = $_POST['faculty_name'];
    $faculty_email = $_POST['faculty_email'];
    $faculty_password = $_POST['faculty_password'];
    $faculty_branch = $_POST['faculty_branch'];
    $faculty_phone = $_POST['faculty_phone'];
    if(isset($_POST['faculty_roles']))
    {
        $faculty_roles=implode(",",$_POST['faculty_roles']);
    }
    $faculty_roles=0;
    $stmt1 = $conn->prepare( "insert into faculty(faculty_name, faculty_email_id, faculty_password, faculty_branch, faculty_phone, faculty_roles, faculty_added) values (?,?,?,?,?,?,?)" );
    $stmt1->bind_param( "sssssss", $faculty_name, $faculty_email, $faculty_password, $faculty_branch, $faculty_phone, $faculty_roles, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["addSubject_btn"] ) ) {
    $subject_name = $_POST['subject_name'];
    $subject_branch = $_POST['subject_branch'];
    $stmt1 = $conn->prepare( "insert into subjects(subject_name, subject_branch, subject_added) values (?,?,?)" );
    $stmt1->bind_param( "sss", $subject_name, $subject_branch, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["addCourse_btn"] ) ) {
    $course_class=$_POST['course_class'];
    $course_faculty=$_POST['course_faculty'];
    $course_subject=$_POST['course_subject'];
    $stmt1 = $conn->prepare("insert into courses(course_class, course_faculty, course_subject, course_added) values (?,?,?,?)");
    $stmt1->bind_param( "ssss", $course_class, $course_faculty, $course_subject, $date );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["addClasses_btn"] ) ) {
    $class_name=$_POST['class_name'];
    $class_branch=$_POST['class_branch'];
    $class_batch=$_POST['class_batch'];
    $class_year=$_POST['class_year'];
    $class_sem=$_POST['class_sem'];
    $stmt1 = $conn->prepare("insert into classes(class_name, class_branch, class_batch, class_year, class_sem, class_created) values (?,?,?,?,?,?)");
    $stmt1->bind_param( "ssssss", $class_name, $class_branch, $class_batch, $class_year, $class_sem, $date );
    $stmt1->execute();
    $class_id=$conn->insert_id;
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    $stmt1 = $conn->prepare("update student_status set student_class=? where course_year=? and sem=? and batch_year=?");
    $stmt1->bind_param( "ssss", $class_id, $class_year, $class_sem, $class_batch,);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}
if ( isset( $_POST["add_attendance"] ) ) {
    $course_list=$_POST['course_list'];
    $date_attended=$_POST['date_attended'];
    $start_time=$_POST['start_time'];
    $end_time=$_POST['end_time'];
    $attendance=implode(",",$_POST['attendance']);
    
    $stmt1 = $conn->prepare("insert into attendance(attendance_course, attendance_date, start_time, end_time, students_present) values (?,?,?,?,?)");
    $stmt1->bind_param( "sssss", $course_list, $date_attended, $start_time, $end_time, $attendance );
    $stmt1->execute();
    $class_id=$conn->insert_id;
    $affected = $stmt1->affected_rows;
    $stmt1->close();

    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}
?>

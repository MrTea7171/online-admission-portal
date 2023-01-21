<?php
require '../../includes/connection.php';
date_default_timezone_set( 'Asia/Kolkata' );
$date = date( "Y-m-d H:i:s" );
if ( isset( $_POST["editDepartment"] ) ) {
    $newName = $_POST['editDepartment'];
    $deptId = $_POST['editDepartmentId'];
    $department_code = $_POST['department_code'];
    $department_short = $_POST['department_short'];
    $stmt1 = $conn->prepare( "update student_department set department_name=?, department_code=?, department_short=?   where department_id=?" );
    $stmt1->bind_param( "ssss", $newName, $department_code, $department_short ,$deptId );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["cpo_name"] ) ) {
    $cpo_id = $_POST['cpo_id'];
    $cpo_name = $_POST['cpo_name'];
    $cpo_description = $_POST['cpo_description'];
    $cpo_role = $_POST['cpo_role'];
    $cpo_salary = $_POST['cpo_salary'];
    $cpo_link = $_POST['cpo_link'];
    $cpo_ldate = $_POST['cpo_ldate'];
    $cpo_logo = $_POST['cpo_img'];
    $file_path = "../img/companies/";
    if ( isset( $_FILES['cpo_logo'] ) )  {
        $ext = explode( '.', basename( $_FILES['cpo_logo']['name'] ) );
        $file_extension = end( $ext );
        $file_name = strtotime( $date ).".".$file_extension;
        move_uploaded_file( $_FILES['cpo_logo']['tmp_name'], $file_path.$file_name );
        $cpo_logo = "companies/".$file_name;
    }
    $stmt1 = $conn->prepare( "update college_placement_offers set cpo_name=?,cpo_description=?,cpo_role=?,cpo_salary=?,cpo_link=?,cpo_ldate=?,cpo_logo=? where cpo_id=?" );
    $stmt1->bind_param( "sssssssi", $cpo_name, $cpo_description, $cpo_role, $cpo_salary, $cpo_link, $cpo_ldate, $cpo_logo, $cpo_id);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["editConfirm_btn"] ) ) {
    $studentId=$_POST['editConfirmId'];
    $studentCapId=$_POST['editStudentCap'];
    $studentName=$_POST['editStudentName'];
    $studentEmail=$_POST['editStudentEmail'];

    $stmt1 = $conn->prepare( "update student_confirm set student_name=?, cap_id=?,  email_id=? where confirm_id=?" );
    $stmt1->bind_param( "ssss", $studentName, $studentCapId, $studentEmail, $studentId);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["student_status"] ) ) {
    $student=$_POST['student'];
    $admission_status=$_POST['admission_status'];
    $student_remark=$_POST['student_remark'];
    $stmt1 = $conn->prepare( "update student_college_details set admission_status=?, admission_remark=? where student_id=?" );
    $stmt1->bind_param( "sss", $admission_status, $student_remark, $student);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["editFee_btn"] ) ) {
    $fee_no=$_POST['editFeeId'];
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
    $stmt1 = $conn->prepare("update student_fees set batch=?, year=?, caste=?, tution_fee=?, development_fee=?, other_fees=?, caution_money=?, enrollment_fees=?, form_fees=?, sports_fees=?, cultural_fees=?, relief_fund=?, gym_fees=?, e_charges=?, yuvia_fees=?, others=?, total_fees=? where fee_no=?");
    $stmt1->bind_param( "ssssssssssssssssss", $batch, $year, $caste, $tution_fees, $development_fees, $other_fees, $caution_money, $enrollment_fees, $form_fees, $sports_fees, $cultural_fees, $relief_fund, $gymkhana_fees, $e_charges, $yuvia_fees, $others, $total_fees, $fee_no );
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 ) {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["edit_faculty"] ) ) {
    $faculty_name=$_POST['faculty_name'];
    $faculty_phone=$_POST['faculty_phone'];
    $faculty_email=$_POST['faculty_email'];
    $faculty_branch=$_POST['faculty_branch'];
    $faculty_id=$_POST['faculty_id'];
    if(isset($_POST['faculty_roles']))
    {
        $faculty_roles=implode(",",$_POST['faculty_roles']);
    }
    $faculty_roles=0;
    $stmt1 = $conn->prepare( "update faculty set faculty_name=?, faculty_email_id=?, faculty_phone=?, faculty_branch=?, faculty_roles=? where faculty_id=?" );
    $stmt1->bind_param( "ssssss", $faculty_name ,$faculty_email ,$faculty_phone ,$faculty_branch, $faculty_roles, $faculty_id);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["edit_subject"] ) ) {
    $subject_name=$_POST['subject_name'];
    $subject_branch=$_POST['subject_branch'];
    $subject_id=$_POST['subject_id'];
    $stmt1 = $conn->prepare( "update subjects set subject_name=?, subject_branch=? where subject_id=?" );
    $stmt1->bind_param( "sss", $subject_name ,$subject_branch,$subject_id);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["edit_course"] ) ) {
    $course_class=$_POST['course_class'];
    $course_faculty=$_POST['course_faculty'];
    $course_subject=$_POST['course_subject'];
    $course_id=$_POST['course_id'];
    $stmt1 = $conn->prepare("update courses set course_class=? ,course_faculty=? ,course_subject=? where course_id=?");
    $stmt1->bind_param("ssss", $course_class ,$course_faculty ,$course_subject, $course_id);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["edit_class"] ) ) {
    $class_name=$_POST['class_name'];
    $class_branch=$_POST['class_branch'];
    $class_batch=$_POST['class_batch'];
    $class_year=$_POST['class_year'];
    $class_sem=$_POST['class_sem'];
    $class_id=$_POST['class_id'];
    $stmt1 = $conn->prepare("update classes set class_name=?, class_branch=? ,class_batch=? ,class_year=? ,class_sem=?  where class_id=?");
    $stmt1->bind_param("ssssss", $class_name, $class_branch, $class_batch, $class_year, $class_sem, $class_id);
    $stmt1->execute();
    $affected = $stmt1->affected_rows;
    $stmt1->close();
    if ( $affected>0 )  {
        echo "success";
    } else {
        echo "error";
    }
}
?>

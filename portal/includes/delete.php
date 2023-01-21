<?php
    require '../../includes/connection.php';
    if(isset($_POST["DeleteDepartment"]))
    {
        $deptId=$_POST['Department_id'];
        $stmt1 = $conn->prepare( "delete from student_department where department_id=?" );
            $stmt1->bind_param("i",$deptId);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }

    if(isset($_POST["DeleteOffer"]))
    {
        $offerId=$_POST['Offer_id'];
        $stmt1 = $conn->prepare( "delete from college_placement_offers where cpo_id=?" );
            $stmt1->bind_param("i",$offerId);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }

    if(isset($_POST["DeleteStudent"]))
    {
        $studentId=$_POST['Student_id'];
        $stmt1 = $conn->prepare( "delete from student_confirm where confirm_id=?" );
            $stmt1->bind_param("i",$studentId);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }
    if(isset($_POST["DeleteFeeDetail"]))
    {
        $feeId=$_POST['Fee_id'];
        $stmt1 = $conn->prepare( "delete from student_fees where fee_no=?" );
            $stmt1->bind_param("i",$feeId);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }

    if(isset($_POST["DeleteFaculty"]))
    {
        $faculty_id=$_POST['Faculty_id'];
        $stmt1 = $conn->prepare( "delete from faculty where faculty_id=?" );
            $stmt1->bind_param("i",$faculty_id);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }

    if(isset($_POST["DeleteSubject"]))
    {
        $subject_id=$_POST['Subject_id'];
        $stmt1 = $conn->prepare( "delete from subjects where subject_id=?" );
            $stmt1->bind_param("i",$subject_id);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }

if(isset($_POST["DeleteCourse"]))
    {
        $courseId=$_POST['CourseId'];
        $stmt1 = $conn->prepare( "delete from courses where course_id=?" );
            $stmt1->bind_param("i",$courseId);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }

if(isset($_POST["DeleteClass"]))
    {
        $classId=$_POST['ClassId'];
        $stmt1 = $conn->prepare( "delete from classes where class_id=?" );
            $stmt1->bind_param("i",$classId);
            $stmt1->execute();
            $affected = $stmt1->affected_rows;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
    }
?>
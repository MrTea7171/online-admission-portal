<?php
    session_start();
    require 'connection.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date( "Y-m-d H:i:s" );
    if ( isset( $_POST["add_workexp_btn"] ) ) {
        $exp_type = $_POST["exp_type"];
        $company_name = $_POST["company_name"];
        $company_description = $_POST["company_description"];
        $company_link = $_POST["company_link"];
        $company_contact = $_POST["company_contact"];
        $company_role = $_POST["company_role"];
        $company_pay = $_POST["company_pay"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $work_description = $_POST["work_description"];
        $technology_description = $_POST["technology_description"];
        $offer_letter = "";
        $work_letter = "";
        $company_logo = "";
        $student_id = 1;
        $file_path_img = "../portal/img/work_experience/img/";
        $file_path_offer = "../portal/img/work_experience/offer_letter/";
        $file_path_exp = "../portal/img/work_experience/exp_letter/";
        if ( !file_exists( $file_path_img ) )  {
            mkdir( $file_path_img, 0777, true );
        }
        if ( !file_exists( $file_path_offer ) )  {
            mkdir( $file_path_offer, 0777, true );
        }
        if ( !file_exists( $file_path_exp ) )  {
            mkdir( $file_path_exp, 0777, true );
        }
        if ( isset( $_FILES['offer_letter'] ) )  {
            $ext = explode( '.', basename( $_FILES['offer_letter']['name'] ) );
            $file_extension = end( $ext );
            $file_name = strtotime( $date ).".".$file_extension;
            move_uploaded_file( $_FILES['offer_letter']['tmp_name'], $file_path_offer.$file_name );
            $offer_letter = "work_experience/offer_letter/".$file_name;
        }
        if ( isset( $_FILES['company_logo'] ) )  {
            $ext = explode( '.', basename( $_FILES['company_logo']['name'] ) );
            $file_extension = end( $ext );
            $file_name = strtotime( $date ).".".$file_extension;
            move_uploaded_file( $_FILES['company_logo']['tmp_name'], $file_path_img.$file_name );
            $company_logo = "work_experience/img/".$file_name;
        }
        if ( isset( $_FILES['work_letter'] ) )  {
            $ext = explode( '.', basename( $_FILES['work_letter']['name'] ) );
            $file_extension = end( $ext );
            $file_name = strtotime( $date ).".".$file_extension;
            move_uploaded_file( $_FILES['work_letter']['tmp_name'], $file_path_exp.$file_name );
            $work_letter = "work_experience/exp_letter/".$file_name;
        }
        $stmt1 = $conn->prepare( "insert into student_work_exp(student_id, wexp_type, wexp_company_logo, wexp_company_name, wexp_company_description, wexp_company_link, wexp_company_contact, wexp_company_salary, wexp_company_role, wexp_company_sdate, wexp_company_edate, wexp_work_description, wexp_tech_description, wexp_offer_letter, wexp_exp_letter, wexp_added_on) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );
        $stmt1->bind_param( "ssssssssssssssss", $student_id, $exp_type, $company_logo, $company_name, $company_description, $company_link, $company_contact, $company_pay, $company_role, $start_date, $end_date, $work_description, $technology_description, $offer_letter, $work_letter, $date );
        $stmt1->execute();
        $affected = $stmt1->affected_rows;
        $stmt1->close();
        if ( $affected>0 )  {
            echo "success";
        } else {
            echo "error";
        }
    }

    if ( isset( $_POST["wexp_id"] ) ) {
        $exp_id = $_POST["wexp_id"];
        $exp_type = $_POST["exp_type"];
        $company_name = $_POST["company_name"];
        $company_description = $_POST["company_description"];
        $company_link = $_POST["company_link"];
        $company_contact = $_POST["company_contact"];
        $company_role = $_POST["company_role"];
        $company_pay = $_POST["company_pay"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $work_description = $_POST["work_description"];
        $technology_description = $_POST["technology_description"];
        $offer_letter = $_POST["wexp_coffer"];
        $work_letter = $_POST["wexp_cexp"];
        $company_logo = $_POST["wexp_clogo"];
        $student_id = 1;
        if ( isset( $_FILES['offer_letter'] ) )  {
            $ext = explode( '.', basename( $_FILES['offer_letter']['name'] ) );
            $file_extension = end( $ext );
            $file_name = strtotime( $date ).".".$file_extension;
            move_uploaded_file( $_FILES['offer_letter']['tmp_name'], $file_path_offer.$file_name );
            $offer_letter = "work_experience/offer_letter/".$file_name;
        }
        if ( isset( $_FILES['company_logo'] ) )  {
            $ext = explode( '.', basename( $_FILES['company_logo']['name'] ) );
            $file_extension = end( $ext );
            $file_name = strtotime( $date ).".".$file_extension;
            move_uploaded_file( $_FILES['company_logo']['tmp_name'], $file_path_img.$file_name );
            $company_logo = "work_experience/img/".$file_name;
        }
        if ( isset( $_FILES['work_letter'] ) )  {
            $ext = explode( '.', basename( $_FILES['work_letter']['name'] ) );
            $file_extension = end( $ext );
            $file_name = strtotime( $date ).".".$file_extension;
            move_uploaded_file( $_FILES['work_letter']['tmp_name'], $file_path_exp.$file_name );
            $work_letter = "work_experience/exp_letter/".$file_name;
        }
        $stmt1 = $conn->prepare( "update student_work_exp set wexp_type=?, wexp_company_logo=?, wexp_company_name=?, wexp_company_description=?,  wexp_company_link=?, wexp_company_contact=?, wexp_company_salary=?, wexp_company_role=?, wexp_company_sdate=?, wexp_company_edate=?, wexp_work_description=?, wexp_tech_description=?, wexp_offer_letter=?, wexp_exp_letter=? where wexp_id=? and student_id=?" );
        $stmt1->bind_param( "ssssssssssssssss", $exp_type, $company_logo, $company_name, $company_description, $company_link, $company_contact, $company_pay, $company_role, $start_date, $end_date, $work_description, $technology_description, $offer_letter, $work_letter, $exp_id, $student_id );
        $stmt1->execute();
        $affected = $stmt1->affected_rows;
        $stmt1->close();
        if ( $affected>0 )  {
            echo "success";
        } else {
            echo "error";
        }
    }

    if ( isset( $_POST["DeleteExp"] ) ) {
        $expId = $_POST['Work_id'];
        $stmt1 = $conn->prepare( "delete from student_work_exp where wexp_id=?" );
        $stmt1->bind_param( "i", $expId );
        $stmt1->execute();
        $affected = $stmt1->affected_rows;
        $stmt1->close();
        if ( $affected>0 )  {
            echo "success";
        } else {
            echo "error";
        }
    }

    if ( isset( $_POST["login_student_btn"] ) ) {
        $unique_id = $_POST['unique_id'];
        $password = $_POST['password'];
        $stmt1 = $conn->prepare( "select sp.enrollment_no,sa.student_password from student_accounts sa inner join student_personal sp on sa.student_id=sp.student_id where sa.student_password=? and (sp.student_ien=? or sp.enrollment_no=?)");
        $stmt1->bind_param( "sss", $password, $unique_id, $unique_id);
        $stmt1->execute();
        $result = $stmt1->get_result();
        $count = $result->num_rows;
        $row = $result->fetch_assoc();
        $stmt1->close();
        if ( $count>0 )  {
            $_SESSION['user_enroll']=$row['enrollment_no'];
            echo "success";
        } else {
            echo "error";
        }
    }
?>
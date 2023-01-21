<?php
session_start();
require '../../includes/connection.php';
date_default_timezone_set( 'Asia/Kolkata' );
$date = date( "Y-m-d H:i:s" );

if ( isset( $_POST["login_faculty_btn"] ) ) {
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $stmt1 = $conn->prepare( "select faculty_email_id, faculty_roles from faculty where faculty_email_id=? and faculty_password=?");
    $stmt1->bind_param( "ss", $email_id, $password);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count = $result->num_rows;
    $row = $result->fetch_assoc();
    $stmt1->close();
    if ( $count>0 )  {
        $_SESSION['user_mode']='faculty';
        $_SESSION['user_id']=$row['faculty_email_id'];
        $_SESSION['user_roles']=explode(",",$row['faculty_roles']);
        echo "success";
    } else {
        echo "error";
    }
}

if ( isset( $_POST["login_admin_btn"] ) ) {
    $email_id = $_POST['email_id'];
    $password = $_POST['password'];
    $stmt1 = $conn->prepare( "select admin_email from admin_accounts where admin_email=? and admin_password=?");
    $stmt1->bind_param( "ss", $email_id, $password);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count = $result->num_rows;
    $row = $result->fetch_assoc();
    $stmt1->close();
    if ( $count>0 )  {
        $_SESSION['user_mode']='admin';
        $_SESSION['user_id']=$row['admin_email'];
        echo "success";
    } else {
        echo "error";
    }
}
?>

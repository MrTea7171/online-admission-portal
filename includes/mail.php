<?php
session_start();
require 'connection.php';
require( '../smtp/PHPMailerAutoload.php' );
date_default_timezone_set( 'Asia/Kolkata' );
$date = date( "Y-m-d H:i:s" );
$data=0;
function generateNumericOTP( $n ) {
    $generator = rand( 0, 1453678 );
    $result = "";
    for ( $i = 1; $i <= $n; $i++ ) {
        $result .= substr( $generator, ( rand()%( strlen( $generator ) ) ), 1 );
    }
    return $result;
}

function smtp_mailer( $to, $subject, $body ) {
    $mail = new PHPMailer();
    //$mail->SMTPDebug = 3;
    $mail->IsSMTP();

    $mail->SMTPAuth = true;

    $mail->SMTPSecure = 'tsl';

    $mail->Host = "mail";
    $mail->Port = "Port";

    $mail->IsHTML( true );
    $mail->CharSet = 'UTF-8';
    $mail->Username = "your email";
    $mail->Password = 'your password';
    $mail->SetFrom( "your email" );
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress( $to );
    $mail->SMTPOptions = array( 'ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ) );
    if ( !$mail->Send() ) {
        //echo $mail->ErrorInfo;
        return 0;
    } else {
        return 1;
    }
}
if ( isset( $_POST['register_otp_btn'] ) ) {
    $unique_id = $_POST['unique_id'];
    $email = $_POST['email_id'];
    $stmt1 = $conn->prepare( "select * from student_confirm where email_id=? and (cap_id=? or enrollment_id=?)" );
    $stmt1->bind_param( "sss", $email, $unique_id, $unique_id );
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count = $result->num_rows;
    if ( $count>0 ) {
        $row = $result->fetch_assoc();
        $student = $row['student_name'];
        $student_id = $row['confirm_id'];
        $_SESSION['confirm_id']=$row['confirm_id'];
        $otp = generateNumericOTP( 6 );
        $subject = "Verification OTP for Registration";
        $body = "<div>
            <p>Dear ".$student.", </p>
            <h4><span>The OTP for registration is: <b>".$otp."<b></span></h4>
            </div>";
        $data=smtp_mailer( $email, $subject, $body );
        $stmt1 = $conn->prepare( "insert into student_otp(confirm_no, opt, date_created) values (?,?,?)" );
        $stmt1->bind_param( "sss", $student_id, $otp, $date );
        $stmt1->execute();
        $affected = $stmt1->affected_rows;
        $stmt1->close();
        if($affected>0 && $data>0)
        {
            echo 'success';
        }
        else
        {
            echo 'errorOtp';
        }
        
    }
    else
    {
        echo "error";
    }
    
}
if ( isset( $_POST['otp_check_btn'] ) ) {
    $otp = $_POST['otp'];
    $confirm_id=$_SESSION['confirm_id'];
    $stmt1 = $conn->prepare( "select cs.student_name, cs.enrollment_id , cs.email_id, so.date_created from student_otp so inner join student_confirm cs on so.confirm_no=cs.confirm_id  where so.opt=? and so.confirm_no=?" );
    $stmt1->bind_param( "ss", $otp, $confirm_id );
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count = $result->num_rows;
    if ( $count>0 ) {
        $row = $result->fetch_assoc();
        $timeDiff=(abs(strtotime('now') - strtotime($row['date_created'])))/60;
        if(($timeDiff)<3)
        {
            $_SESSION['confirm_id']=null;
            $_SESSION['user_enroll']=$row['enrollment_id'];
            echo "success";  
        }
        else 
        {
            echo "timeError";
        }
            
    }
    else
    {
        echo "error";
    }
    
}
?>
<?php
session_start();
require 'connection.php';
require('../razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
date_default_timezone_set( 'Asia/Kolkata' );
$date = date( "Y-m-d H:i:s" );
$enroll = $_SESSION['user_enroll'];
if(isset($_POST['payment'])) 
{
    $stmt = $conn->prepare( "select student_id,student_fname,student_email,student_phone from student_personal where enrollment_no=?" );
    $stmt->bind_param( "s", $enroll );
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;
    $name = '';
    $email = '';
    $phone = '';
    $student_id = 0;
    if ( $count>0 ) {
        $row = $result->fetch_assoc();
        $name = $row['student_fname'];
        $email = $row['student_email'];
        $phone = $row['student_phone'];
        $student_id = $row['student_id'];
    }

    $stmt = $conn->prepare( "select total_fees from student_fees where batch=(select batch from payment_status where student_id=? order by pstatus_id desc limit 1) and year=(select year from payment_status where student_id=? order by pstatus_id desc limit 1) and caste=(select student_caste from student_personal where student_id=?)" );
    $stmt->bind_param( "sss", $student_id, $student_id, $student_id );
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $count = $result->num_rows;
    $fees = 0;
    $fee_no = 0;
    if ( $count>0 ) {
        $row = $result->fetch_assoc();
        $fees = $row['total_fees'];
    }

    $arr = array( 'student_id'=>$student_id, 'student_name'=>$name, 'student_phone'=>$phone, 'student_email'=>$email, 'total_fees'=>$fees );
    echo json_encode( $arr );

}
if(isset($_POST['bill']))
{
    $student_id=$_POST['student'];
    $amount_paid=$_POST['amount'];
    $status=$_POST['status'];
    $transaction_id=$_POST['transaction_id'];
    if(!empty($transaction_id) && $transaction_id!=null)
	{
		$api=new Api('rzp_test_NcbZkxdlUuP2zo', 'MHidNjviSVqFmjJkVJRIW5mU');
		$payment=$api->payment->fetch($transaction_id);
		$text=json_encode($payment->toArray());
        echo $text;
		$obj=json_decode($text,true);
		$pg_pay_mode=strtoupper($obj["method"]);
        $card_id="";
        if(isset($obj["card_id"]))
        {
            $card_id=$obj["card_id"];
        }
		$bank=$obj["bank"];
        $stmt = $conn->prepare( "select pstatus_id from payment_status where student_id=? order by pstatus_id desc limit 1;" );
        $stmt->bind_param( "s", $student_id );
        $stmt->execute();
        $result = $stmt->get_result();
        $count=$result->num_rows;
        $stmt->close();
        $pstatus=0;
        if ( $count>0 ) {
            $row = $result->fetch_assoc();
            $pstatus=$row['pstatus_id'];
        }
        
        $stmt = $conn->prepare( "insert into payment_records(pstatus_id, amount_paid, unique_id, payment_mode, payment_bank, payment_date) values (?,?,?,?,?,?)" );
        $stmt->bind_param( "ssssss", $pstatus,$amount_paid,$transaction_id,$pg_pay_mode,$bank,$date);
        $stmt->execute();
        $stmt->close();
        
        $status="Done";
        $stmt = $conn->prepare( "update payment_status set status=?, date_updated=? where pstatus_id=?" );
        $stmt->bind_param( "sss", $status ,$date, $pstatus);
        $stmt->execute();
        $stmt->close();
        
        $admission="Admitted";
        $stmt = $conn->prepare( "update student_college_details set admission_status=? where student_id=?" );
        $stmt->bind_param( "ss", $admission ,$student_id);
        $stmt->execute();
        $affected=$stmt->affected_rows;
        $stmt->close();
        
        $stmt = $conn->prepare( "select student_admission_to from student_college_details where student_id=?" );
        $stmt->bind_param( "s", $student_id );
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $pstatus=0;
        $count=$result->num_rows;
        if ( $count>0 ) {
        $row = $result->fetch_assoc();
            $admitted_to=$row['student_admission_to'];
        }
        
        $course_year="";
        $sem="";
        
        if($admitted_to=="FE")
        {
            $course_year="FE";
            $sem="I";
        }
        else
        {
            $course_year="SE";
            $sem="III";
        }
        
        $batch_year=date("Y");
        
        $stmt = $conn->prepare( "insert into student_status(student_id, course_year, sem, batch_year, last_updated) values (?,?,?,?,?)" );
        $stmt->bind_param( "sssss", $student_id, $course_year, $sem ,$batch_year, $date);
        $stmt->execute();
        $stmt->close();
        
        if($affected>0)
        {
             echo 'success';
        }
        else if($affected==0)
        {
             echo 'error';
        }
    }
}
?>

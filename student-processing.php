<?php
    session_start();
    require 'includes/connection.php';
    $enroll=$_SESSION['user_enroll'];
    if(!isset($_SESSION['user_enroll']))
    {
        header("Location:student-login.php");
    }
    $stmt = $conn->prepare( "select admission_status, student_id from student_college_details where student_id=(select  student_id from student_personal where enrollment_no= ?)" );
    $stmt->bind_param("s", $enroll);
    $stmt->execute();
    $result = $stmt->get_result();
    $count=$result->num_rows;
    $stmt->close();
    $status='';
    $student_id='';
    if($count>0)
    {
        $row = $result->fetch_assoc();
        $status=$row['admission_status'];
        $student_id=$row['student_id'];

    }
    if($status=='Admitted')
    {
        $_SESSION['status']='Admitted';
        header("Location:student-profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admission Processing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
    <div class="container center_box">
        <div class="col-md-10 box_model p-5">
            <?php 
                if($status=='Applied')
                {
            ?>
            <div id="waiting_box" class="text-center  process_box">
                <img src="img/audit.png" alt="verification">
                <h3>Please wait for few days, while your provided data and documents are being verified by our admission office for smooth admission process.</h3>
            </div>
            <?php 
                }
                else if($status=='Verified')
                {
                    
                    $stmt = $conn->prepare( "select fee_no,total_fees from student_fees where batch=(select batch from payment_status where student_id=? order by pstatus_id desc limit 1) and year=(select year from payment_status where student_id=? order by pstatus_id desc limit 1) and caste=(select student_caste from student_personal where student_id=?)" );
                    $stmt->bind_param("sss", $student_id, $student_id, $student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $stmt->close();
                    $count=$result->num_rows;
                    $fees=0;
                    $fee_no=0;
                    if($count>0)
                    {
                        $row = $result->fetch_assoc();
                        $fees=$row['total_fees'];                       $fee_no=$row['fee_no'];

                    }
            ?>
            <div id="payment_box" class="text-center process_box">
                <img src="img/verify.png" alt="verify">
                <h3>Your data has been verified. Please proceed to payment.</h3>
                <h2>Your Net Fees is Rs.<?php echo $fees;  ?></h2>
                <p><a href="portal/Admin/Fee-Details.php?fee_id=<?php echo $fee_no; ?>">Click here to view cost breakup</a></p>
                <div id="payment_options">
                    <a href="#" id='online_payment'>Online</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#offline_box">Offline</a>
                </div>
            </div>
            <?php 
                }
                else if($status=='ReSubmit')
                {
            ?>
            <div id="payment_box" class="text-center process_box">
                <img src="img/mistake.png" alt="verify">
                <h3>There was some problem found during verification please make the changes provided by our admission office.</h3>
                <p id="correction_text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <a href="#" id="edit_form_link">Click here to edit your form.</a>
            </div>
            <?php 
                }
            ?>
            <a href="logout.php" class="mt-4 d-block text-center dark_green_bg" id="sign_out_link">Logout</a>
        </div>
    </div>
    <div class="modal fade" id="offline_box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Instructions for Offline Admission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        Fees to be submitted through Demand Draft drawn in favor of "NEW HORIZON INSTITUTE OF TECHNOLOGY & MANAGEMENT"
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
    <button id="rzp-button1">Pay</button>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="js/payment.js"></script>
</body>

</html>

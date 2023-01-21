<?php
    require 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
    <div class="container center_box">
        <div class="col-md-4 box_model">
            <p id="notice_text">Note: Only students who have confirmed NHITM as their final college in CAP round or have registered offline in campus can fill the admission form.</p>
            <p id="otp_text" class="hide_box red_text">The provided OTP expires in 3 minutes.</p>
            <form id="register_verify_form">
                <div class="mb-3">
                    <label for="unique_id" class="form-label">CAP Id/ Enrollment Id</label>
                    <input type="text" class="form-control" id="unique_id" name="unique_id">
                </div>
                <div class="mb-3">
                    <label for="email_id" class="form-label">Email ID</label>
                    <input type="text" class="form-control" id="email_id" name="email_id">
                </div>
                <button type="submit" name="register_otp_btn" id="register_otp_btn" class="btn btn-success w-100" value="register_otp">Send OTP</button>
                <label class="form-label" id="error_otp"></label>
            </form>
            <form id="register_verify_otp" class="hide_box">
                <div class="mb-3">
                    <label for="otp" class="form-label">OTP:</label>
                    <input type="otp" class="form-control" id="otp" name="otp">
                </div>
                <div class="mb-3 text-center">
                    <a href="#" class="dark_green_color no_underline" id="resend_otp">Resend OTP</a>
                </div>
                <button type="submit" name="otp_check_btn" id="otp_check_btn" class="btn btn-success w-100" value="otp_check">Proceed to Admission</button>
            </form>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
        require("includes/FormLib.php");
    ?>
    <script src="js/registration.js"></script>
</body>

</html>

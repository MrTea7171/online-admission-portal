<?php
    require 'includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
    <div class="container center_box">
        <div class="col-md-4 box_model">
            <form id="student_login">
                <div class="mb-3">
                    <label for="unique_id" class="form-label">Enrollment Id / IEN No. :</label>
                    <input type="text" class="form-control" id="unique_id" name="unique_id">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" name="login_student_btn" id="login_student_btn" class="btn btn-success w-100" value="login_student_btn">Login</button>
                <a href="student-registration-verification.php" class="mt-3 d-block text-center" id="register_link">New Student? Register Here.</a>
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

<?php
    session_start();
    
    if(isset($_POST['student_profile_view']))
    {
        $_SESSION["student_profile_key"]=$_POST['student'];
        echo "success";
    }
?>
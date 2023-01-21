<?php
    session_start();
    session_destroy();
    header("Location:faculty-login.php");
?>
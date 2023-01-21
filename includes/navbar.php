<?php 
    function active($page,$link)
    {
        if($page==$link)
        {
            return "active";
        }
    }
    $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3" id="student_navbar">
    <a class="navbar-brand display-2" href="#">NHITM Student Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_student" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end mx-3" id="navbar_student">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo active($page,"student-profile.php"); ?>" href="student-profile.php">Profile</a>
            <a class="nav-item nav-link <?php echo active($page,"student-placement-offers.php"); ?>" href="student-placement-offers.php">Placement Offers</a>
            <a class="nav-item nav-link <?php echo active($page,"student-work-experience.php"); ?>" href="student-work-experience.php">Work Experience</a>
            <a class="nav-item nav-link <?php echo active($page,"student-exam-report.php"); ?>" href="student-exam-report.php">Exam Report</a>
            <a class="nav-item nav-link <?php echo active($page,"student-annoucement.php"); ?>" href="student-annoucement.php">Annoucement</a>
            <a class="nav-item nav-link <?php echo active($page,"student-payment-report.php"); ?>" href="student-payment-report.php">Payment Reports</a>
            <a class="nav-item nav-link <?php echo active($page,"logout.php"); ?>" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

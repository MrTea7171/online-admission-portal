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
    <a class="navbar-brand display-2" href="#">NHITM Admin Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_student" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end mx-3" id="navbar_student">
        <div class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Academic Details
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item <?php echo active($page,"departments.php"); ?>" href="departments.php">Departments</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"faculty.php"); ?>" href="faculty.php">Faculty</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"subjects.php"); ?>" href="subjects.php">Subject</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"classes.php"); ?>" href="classes.php">Classes</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"courses.php"); ?>" href="courses.php">Courses</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Placement Details
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item <?php echo active($page,"student-internships.php"); ?>" href="student-internships.php">Student Internships</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"student-placements.php"); ?>" href="student-placements.php">Student Placement</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Student Details
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item <?php echo active($page,"confirmed-students.php"); ?>" href="confirmed-students.php">Confirmed Students</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"registered-students.php"); ?>" href="registered-students.php">Registered Students</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"student_details.php"); ?>" href="student_details.php">Student Details</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Payment Details
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item <?php echo active($page,"fees.php"); ?>" href="fees.php">Fees</a></li>
                </ul>
            </li>
            <a class="nav-item nav-link <?php echo active($page,"faculty-annoucement.php"); ?>" href="faculty-annoucement.php">Announcements</a>
            <a class="nav-item nav-link <?php echo active($page,"logout.php"); ?>" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

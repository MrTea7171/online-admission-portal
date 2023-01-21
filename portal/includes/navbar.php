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
    <a class="navbar-brand display-2" href="#">NHITM Faculty Portal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_student" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end mx-3" id="navbar_student">
        <div class="navbar-nav">
            <a class="nav-item nav-link <?php echo active($page,"faculty-profile.php"); ?>" href="faculty-profile.php">Account Details</a>
            <a class="nav-item nav-link <?php echo active($page,"faculty-courses.php"); ?>" href="faculty-courses.php">Courses</a>
            <a class="nav-item nav-link <?php echo active($page,"faculty-attendance.php"); ?>" href="faculty-attendance.php">Attendance</a>
            <a class="nav-item nav-link <?php echo active($page,"faculty-annoucement.php"); ?>" href="faculty-annoucement.php">Announcement</a>
            <a class="nav-item nav-link <?php echo active($page,"student-annoucement.php"); ?>" href="student-annoucement.php">Exam Details</a>
            <?php
                if(isset($_SESSION['user_roles']))
                {
                    
                    echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Switch Roles
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        $stmtnav = $conn->prepare( "select * from roles" );
                        $stmtnav->execute();
                        $result2 = $stmtnav->get_result();
                        $stmtnav->close();
                        $i=0;
                        while($row2 = $result2->fetch_assoc())
                        {
                            if(in_array($row2['role_id'],$_SESSION['user_roles']))
                            {
                               echo '<li><a class="dropdown-item" href="'.$row2['role_link'].'">'.$row2['role_name'].'</a></li>'; 
                            }
                        }
                        echo '</ul>
                    </li>';
                }
            ?>
            <a class="nav-item nav-link <?php echo active($page,"logout.php"); ?>" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

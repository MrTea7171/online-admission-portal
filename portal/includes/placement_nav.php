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
                    Placement Details
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item <?php echo active($page,"student-internships.php"); ?>" href="student-internships.php">Student Internships</a></li>
                    <li><a class="dropdown-item <?php echo active($page,"student-placements.php"); ?>" href="student-placements.php">Student Placement</a></li>
                </ul>
            </li>
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
                        echo '
                            <li><a class="dropdown-item" href="../faculty/faculty-profile.php">Faculty</a></li>
                        </ul>
                    </li>';
                }
            ?>
            <a class="nav-item nav-link <?php echo active($page,"logout.php"); ?>" href="../faculty/logout.php">Logout</a>
        </div>
    </div>
</nav>

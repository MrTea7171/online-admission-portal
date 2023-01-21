<?php
    session_start();
    if(!isset($_SESSION['user_enroll']) && !isset($_SESSION['status']))
    {
        header("Location:student-login.php");
    }
    require 'includes/connection.php';
    $stmt = $conn->prepare( "select * from college_placement_offers order by cpo_id desc" );
    $stmt->execute();
    $result = $stmt->get_result();
    $count=$result->num_rows;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Placement Offers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
   <?php require("includes/navbar.php"); ?>
    <div class="container mt-3">
       <div class="text-center">
           <h3 id="page_title">Placement Offers</h3>
       </div>
       <?php
            if($count > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    ?>
                    <div class="card mt-3">
            <div class="row g-0">
                <div class="col-md-3 company_image_box">
                    <img src="portal/img/<?php echo $row["cpo_logo"]; ?>" class="img-fluid rounded-start" alt="..." width="100%">
                </div>
                <div class="col-md-9">
                    <div class="card-body company_info_box">
                        <label for="">Company Name:</label>
                        <h5 class="card-title"><?php echo $row["cpo_name"]; ?></h5>
                        <label for="">Company Description:</label>
                        <p class="card-text"><?php echo $row["cpo_description"]; ?></p>
                        <div class="row">
                                <div class="col-md-4">
                                    <label for="">Position:</label>
                                    <p class="card-text"><?php echo $row["cpo_role"]; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Salary:</label>
                                    <p class="card-text"><?php echo $row["cpo_salary"]; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Last date to apply:</label>
                                    <p class="card-text"><?php echo date_format(date_create($row["cpo_ldate"]),"d/m/Y h:i a");?></p>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Link to apply:</label>
                                    <p class="card-text"><a href="<?php echo $row["cpo_link"]; ?>"><?php echo $row["cpo_link"]; ?>/</a></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
                    <?php
                }
            }
        ?>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
</body>

</html>

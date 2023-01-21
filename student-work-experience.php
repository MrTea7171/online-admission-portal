<?php
    session_start();
    if(!isset($_SESSION['user_enroll']) && !isset($_SESSION['status']))
    {
        header("Location:student-login.php");
    }
    $enroll=$_SESSION['user_enroll'];
    require 'includes/connection.php';
    $stmt = $conn->prepare( "select * from student_work_exp where wexp_type= 'Placement' and student_id=(select student_id from student_personal where enrollment_no=?) order by wexp_id desc" );
    $stmt->bind_param("s",$enroll);
    $stmt->execute();
    $result = $stmt->get_result();
    $count=$result->num_rows;
    $stmt->close();

    $stmt2 = $conn->prepare( "select * from student_work_exp where wexp_type= 'Internship' and student_id=(select student_id from student_personal where enrollment_no=?) order by wexp_id desc" );
    $stmt2->bind_param("s",$enroll);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    $count2=$result2->num_rows;
    $stmt2->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Work Experiences</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
   <?php require("includes/navbar.php"); ?>
    <div class="container py-4" id="work_exp_box">
        <div class="text-center">
            <h3 id="page_title">Work Experience</h3>
        </div>
        <section>
            <div class="text-center mt-3">
                <p><a href="#" class="add_exp_btn" data-bs-toggle="modal" data-bs-target="#addworkexp">Add Placement/Internship Experience</a></p>
            </div>
            <h4 class="section_title">Placements</h4>
            <?php
            if($count > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                    ?>
            <div class="card mt-3">
                <div class="row g-0">
                    <div class="col-md-3 company_image_box">
                        <img src="portal/img/<?php echo $row['wexp_company_logo']; ?>" class="img-fluid rounded-start" alt="..." width="100%">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body company_info_box">
                            <label for="">Company Name:</label>
                            <h5 class="card-title"><?php echo $row['wexp_company_name']; ?></h5>
                            <label for="">Company Description:</label>
                            <p class="card-text"><?php echo $row['wexp_company_description']; ?></p>
                            <div class="row row mb-3">
                                <div class="col-md-4">
                                    <label for="">Link:</label>
                                    <p class="card-text"><a href="<?php echo $row['wexp_company_link']; ?>"><?php echo $row['wexp_company_link']; ?></a></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contact:</label>
                                    <p class="card-text"><?php echo $row['wexp_company_contact']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Salary:</label>
                                    <p class="card-text"><?php echo $row['wexp_company_salary']; ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="">Role:</label>
                                    <p class="card-text"><?php echo $row['wexp_company_role']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Start Date:</label>
                                    <p class="card-text">
                                        <?php
                                        $date=date_create($row['wexp_company_sdate']);
                                        echo date_format($date,"j<\s\up>S</\s\up> F Y");
                                    ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">End Date:</label>
                                    <p class="card-text">
                                        <?php
                                        $date=date_create($row['wexp_company_edate']);
                                        echo date_format($date,"j<\s\up>S</\s\up> F Y");
                                    ?></p>
                                </div>
                            </div>
                            <label for="">Work Description:</label>
                            <p class="card-text"><?php echo $row['wexp_work_description']; ?></p>

                            <label for="">Technologies Used:</label>
                            <p class="card-text"><?php echo $row['wexp_tech_description']; ?></p>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <p class="card-text"><a href="portal/img/<?php echo $row['wexp_offer_letter']; ?>" class="view_work_doc" target="_blank">Offer Letter</a></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text"><a href="portal/img/<?php echo $row['wexp_exp_letter']; ?>" class="view_work_doc" target="_blank">Experience Letter</a></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" id="<?php echo $row['wexp_id'];?>"><a href="#" class="edit_work_info edit_placement">Edit Info</a> <a href="#" class="edit_work_info delete_placement">Delete Info</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            else{
                ?>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">No Placement Details Provided.</h5>
                    <p class="card-text">Please provide your placements to view here.</p>
                </div>
            </div>

            <?php
            }
            ?>

        </section>
        <section class="mt-4">
            <h4 class="section_title">Internships</h4>
            <?php
            if($count2 > 0) 
            {
                while($row = $result2->fetch_assoc()) 
                {
                    ?>
            <div class="card mt-3">
                <div class="row g-0">
                    <div class="col-md-3 company_image_box">
                        <img src="portal/img/<?php echo $row['wexp_company_logo']; ?>" class="img-fluid rounded-start" alt="..." width="100%">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body company_info_box">
                            <label for="">Company Name:</label>
                            <h5 class="card-title"><?php echo $row['wexp_company_name']; ?></h5>
                            <label for="">Company Description:</label>
                            <p class="card-text"><?php echo $row['wexp_company_description']; ?></p>
                            <div class="row row mb-3">
                                <div class="col-md-4">
                                    <label for="">Link:</label>
                                    <p class="card-text"><a href="<?php echo $row['wexp_company_link']; ?>"><?php echo $row['wexp_company_link']; ?></a></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contact:</label>
                                    <p class="card-text"><?php echo $row['wexp_company_contact']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Stipend:</label>
                                    <p class="card-text"><?php echo $row['wexp_company_salary']; ?></p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="">Role:</label>
                                    <p class="card-text"><?php echo $row['wexp_company_role']; ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Start Date:</label>
                                    <p class="card-text">
                                        <?php
                                        $date=date_create($row['wexp_company_sdate']);
                                        echo date_format($date,"j<\s\up>S</\s\up> F Y");
                                    ?></p>
                                </div>
                                <div class="col-md-4">
                                    <label for="">End Date:</label>
                                    <p class="card-text">
                                        <?php
                                        $date=date_create($row['wexp_company_edate']);
                                        echo date_format($date,"j<\s\up>S</\s\up> F Y");
                                    ?></p>
                                </div>
                            </div>
                            <label for="">Work Description:</label>
                            <p class="card-text"><?php echo $row['wexp_work_description']; ?></p>

                            <label for="">Technologies Used:</label>
                            <p class="card-text"><?php echo $row['wexp_tech_description']; ?></p>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <p class="card-text"><a href="portal/img/<?php echo $row['wexp_offer_letter']; ?>" class="view_work_doc" target="_blank">Offer Letter</a></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text"><a href="portal/img/<?php echo $row['wexp_exp_letter']; ?>" class="view_work_doc" target="_blank">Internship Letter</a></p>
                                </div>
                                <div class="col-md-4">
                                    <p class="card-text" id="<?php echo $row['wexp_id'];?>"><a href="#" class="edit_work_info edit_placement">Edit Info</a> <a href="#" class="edit_work_info delete_placement">Delete Info</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                    }
                } 
            else{
                ?>
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">No Internship Details Provided.</h5>
                    <p class="card-text">Please provide your internship to view here.</p>
                </div>
            </div>

            <?php
            }
            ?>
        </section>
    </div>
    <div class="modal fade" id="addworkexp" tabindex="-1" role="dialog" aria-labelledby="addworkexp" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Work Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addworkexp_form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="exp_type" class="form-label">Experience Type:</label>
                                <select class="form-control" name="exp_type" id="exp_type">
                                    <option value="" selected disabled hidden>--Select Experience--</option>
                                    <option value="Placement">Placement</option>
                                    <option value="Internship">Internship</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_logo" class="form-label">Company Logo</label>
                                <input type="file" class="form-control" id="company_logo" name="company_logo">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="company_description" class="form-label">Company Description</label>
                                <textarea type="text" class="form-control" id="company_description" name="company_description"></textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_link" class="form-label">Company Link</label>
                                <input type="text" class="form-control" id="company_link" name="company_link">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_contact" class="form-label">Company Contact</label>
                                <input type="text" class="form-control" id="company_contact" name="company_contact">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_pay" class="form-label">Salary/Stipend</label>
                                <input type="text" class="form-control" id="company_pay" name="company_pay">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_role" class="form-label">Role</label>
                                <input type="text" class="form-control" id="company_role" name="company_role">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="work_description" class="form-label">Work Description</label>
                                <textarea type="text" class="form-control" id="work_description" name="work_description"></textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="technology_description" class="form-label">Technology Description</label>
                                <textarea type="text" class="form-control" id="technology_description" name="technology_description"></textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="offer_letter" class="form-label">Offer Letter</label>
                                <input type="file" class="form-control" id="offer_letter" name="offer_letter">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="work_letter" class="form-label">Experience/Internship Letter</label>
                                <input type="file" class="form-control" id="work_letter" name="work_letter">
                            </div>
                        </div>
                        <button type="submit" id="add_workexp_btn" name="add_workexp_btn" class="btn edit_work_info">Add Work Experience</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editworkexp" tabindex="-1" role="dialog" aria-labelledby="addworkexp" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Work Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="editExpbody">

                </div>
            </div>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
        require("includes/FormLib.php");
    ?>
    <script src="js/edit.js"></script>
    <script src="js/delete.js"></script>
</body>

</html>

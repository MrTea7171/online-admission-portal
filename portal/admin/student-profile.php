<?php
    session_start();
    if(!isset($_SESSION['user_mode']) && !isset($_SESSION['user_id']))
    {
        header("Location:admin-login.php");
    }
    require '../../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <?php require("../includes/globalLib.php");?>
    <style>
        .profile-table tr td {
            width: 16.66%;
        }


        #profile_page {
            margin: 0px auto;
        }

        body {
            font-size: 13.5px;
        }

    </style>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container" id="profile_container">
        <div id="profile_page">
            <table class="table profile-table text-right">
                <tr>
                    <td colspan="6">
                        <h2 class="text-center">Student Profile</h2>
                    </td>
                </tr>
                <!--Personal Details Section Start-->
                <tr>
                    <td colspan="6">
                        <h4 class="text-center">Personal Details</h4>
                    </td>
                </tr>
                <?php
                        $student_id=$_SESSION['student_profile_key'];
                        $stmt = $conn->prepare( "select * from student_personal where student_id=?" );
                        $stmt->bind_param('i',$student_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $stmt->close();
                    ?>
                <tr>
                    <td colspan="6"><img class="d-block mx-auto" src="../../student_data/<?php echo $row['student_passport_pic'];?>" height="200px"></td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td id="studentName"><?php echo $row['student_fname'];?></td>
                    <th>Date of Birth:</th>
                    <td><?php
                        $date=date_create($row['student_dob']);
                        echo date_format($date,"j<\s\up>S</\s\up> F Y");?>
                        </td>
                    <th>Age:</th>
                    <td><?php echo date_diff(date_create($row['student_dob']), date_create('today'))->y;?></td>
                </tr>
                <tr>
                    <th>Gender:</th>
                    <td><?php echo $row['student_gender'];?></td>
                    <th>Email:</th>
                    <td><?php echo $row['student_email'];?></td>
                    <th>Phone:</th>
                    <td><?php echo $row['student_phone'];?></td>
                </tr>
                <tr>
                    <th>Religion:</th>
                    <td><?php echo $row['student_religion'];?></td>
                    <th>Caste:</th>
                    <td><?php echo $row['student_caste'];?></td>
                    <th>Status:</th>
                    <td><?php echo $row['student_status'];?></td>
                </tr>
                <tr>
                    <th>Current Address:</th>
                    <td colspan="2"><?php echo $row['student_caddress'];?></td>
                    <th>Permanent Address:</th>
                    <td colspan="2"><?php echo $row['student_paddress'];?></td>
                </tr>
                <tr>
                    <th>Pincode:</th>
                    <td><?php echo $row['student_pincode'];?></td>
                    <th>City:</th>
                    <td><?php echo $row['student_city'];?></td>
                    <th>District:</th>
                    <td><?php echo $row['student_district'];?></td>
                </tr>
                <tr>
                    <th>State:</th>
                    <td><?php echo $row['student_state'];?></td>
                    <th>Aadhar No:</th>
                    <td><?php echo $row['student_aadhar'];?></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th>Documents Submitted:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_aadhar_file'];?>">Aadhar Card</a></td>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_pan_file'];?>">Pan Card</a></td>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_birth_card'];?>">Birth Certificate</a></td>
                    <td>
                        <?php if($row['student_income_file']!="img/no-image.png"){?>
                        <a target="_blank" href="../../student_data/<?php echo $row['student_income_file'];?>">Income Certificate</a>
                        <?php }?>
                    </td>
                    <td>
                        <?php if($row['student_caste_certificate']!="img/no-image.png"){?>
                        <a target="_blank" href="../../student_data/<?php echo $row['student_caste_certificate'];?>">Caste Certificate</a>
                        <?php }?>
                    </td>
                </tr>
                <!--Personal Details Section End-->
                
                <!--Academic Details Section Start-->
                <tr>
                    <td colspan="6">
                        <h4 class="text-center my-2">Academic Details</h4>
                    </td>
                </tr>
                <?php
                        $stmt = $conn->prepare( "select * from student_academic_details where student_id=?" );
                        $stmt->bind_param('i',$student_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $stmt->close();
                        
                        $academic_details=explode(",",$row['academic_details_of']);
                        $details_of="10<sup>th</sup>";
                        if(in_array("12", $academic_details))
                        {
                            $details_of=$details_of.", 12<sup>th</sup>";
                        }
                        if(in_array("diploma", $academic_details))
                        {
                            $details_of=$details_of." diploma";
                        }
                
                    ?>
                <tr>
                    <th>Academic Studies:</th>
                    <td><?php echo $details_of; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                    <!--Tenth Details-->
                <tr>
                    <th>10<sup>th</sup> School:</th>
                    <td><?php echo $row['student_tenth_school'];?></td>
                    <th>10<sup>th</sup> Board:</th>
                    <td><?php echo $row['student_tenth_board'];?></td>
                    <th>10<sup>th</sup> Percentage:</th>
                    <td><?php echo $row['student_tenth_percentage'];?>%</td>
                </tr>
                <tr>
                    <th>10<sup>th</sup> Passing Year:</th>
                    <td><?php echo $row['student_tenth_passyear'];?></td>
                    <th>10<sup>th</sup> Marksheet:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_tenth_marksheet'];?>">Submitted</a></td>
                    <th>10<sup>th</sup> Leaving Certificate:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_tenth_leaving_certificate'];?>">Submitted</a></td>
                </tr>
                    <!--Twelfth Details-->
                    <?php
                        if(in_array("12", $academic_details))
                        {
                    ?>
                <tr>
                    <th>12<sup>th</sup> School:</th>
                    <td><?php echo $row['student_twelfth_school'];?></td>
                    <th>12<sup>th</sup> Board:</th>
                    <td><?php echo $row['student_twelfth_board'];?></td>
                    <th>12<sup>th</sup> Percentage:</th>
                    <td><?php echo $row['student_twelfth_percentage'];?>%</td>
                </tr>
                <tr>
                    <th>12<sup>th</sup> Passing Year:</th>
                    <td><?php echo $row['student_twelfth_passyear'];?></td>
                    <th>12<sup>th</sup> Marksheet:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_twelfth_marksheet'];?>">Submitted</a></td>
                    <th>12<sup>th</sup> Leaving Certificate:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_twelfth_leaving_certificate'];?>">Submitted</a></td>
                </tr>
                   <?php
                        }
                        if(in_array("diploma", $academic_details))
                        {
                    ?>
                    <!--Diploma Details-->
                <tr>
                    <th>Diploma College:</th>
                    <td><?php echo $row['student_diploma_college'];?></td>
                    <th>Diploma Branch:</th>
                    <td><?php echo $row['student_diploma_branch'];?></td>
                    <th>Diploma CGPA:</th>
                    <td><?php echo $row['student_diploma_cgpa'];?></td>
                </tr>
                <tr>
                    <th>Diploma Passing Year:</th>
                    <td><?php echo $row['student_diploma_passyear'];?></td>
                    <th>Diploma Marksheet:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_diploma_marksheet'];?>">Submitted</a></td>
                    <th>Diploma Leaving Certificate:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_diploma_leaving_certificate'];?>">Submitted</a></td>
                </tr>
                    <?php
                        }
                    ?>
                <!--Academic Details Section End-->
                
                <!--Admission Details Section Start-->
                <tr>
                    <td colspan="6">
                        <h4 class="text-center my-2">Admission Details</h4>
                    </td>
                </tr>
                <?php
                    $stmt = $conn->prepare( "select * from student_college_details where student_id=?" );
                    $stmt->bind_param('i',$student_id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $stmt->close();
                ?>
                <tr>
                    <th>Admission Mode:</th>
                    <td><?php echo $row['student_addmission_mode'];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    if($row['student_addmission_mode']=='online'){
                ?>
                <tr>
                    <th>CAP Id:</th>
                    <td><?php echo $row['student_cap_id']?></td>
                    <th>CAP Application:</th>
                    <td><a target="_blank" href="../../student_data/<?php echo $row['student_cap_document'];?>">Submitted</a></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <th>Department:</th>
                    <td><?php echo $row['student_department']?></td>
                    <th>Admission Year:</th>
                    <td><?php echo $row['student_admission_year']?></td>
                    <th>Admission To:</th>
                    <td><?php echo $row['student_admission_to']?></td>
                </tr>
                <!--Admission Details Section End-->
                
                <!--Parents Details Section Start-->
                <tr>
                    <td colspan="6">
                        <h4 class="text-center my-2 section_title">Parents Details</h4>
                    </td>
                </tr>
                <?php
                        $stmt = $conn->prepare( "select * from student_parents_details where student_id=?" );
                        $stmt->bind_param('i',$student_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_assoc();
                        $stmt->close();
                        
                        $parents_details=explode(",",$row['student_details_of']);
                    ?>
                <tr>
                    <th>Details Provided of:</th>
                    <td><?php echo $row['student_details_of'];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                    <!--Mother's Section-->
                <?php
                    if(in_array("Mother",$parents_details))
                    {
                ?>
                <tr>
                    <th>Mother's Name:</th>
                    <td><?php echo $row['student_mother_name'];?></td>
                    <th>Mother's Phone:</th>
                    <td><?php echo $row['student_mother_phone'];?></td>
                    <th>Mother's Email:</th>
                    <td><?php echo $row['student_mother_email'];?></td>
                </tr>
                <tr>
                    <th>Mother's Profession:</th>
                    <td><?php echo $row['student_mother_profession'];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                    }
                ?>
                
                <!--Father's Section-->
                <?php
                    if(in_array("Father",$parents_details))
                    {
                ?>
                <tr>
                    <th>Father's Name:</th>
                    <td><?php echo $row['student_father_name'];?></td>
                    <th>Father's Phone:</th>
                    <td><?php echo $row['student_father_phone'];?></td>
                    <th>Father's Email:</th>
                    <td><?php echo $row['student_father_email'];?></td>
                </tr>
                <tr>
                    <th>Father's Profession:</th>
                    <td><?php echo $row['student_father_profession'];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                
                <!--Guardian's Section-->
                <?php
                    if(in_array("Guardian",$parents_details))
                    {
                ?>
                <tr>
                    <th>Guardian's Name:</th>
                    <td><?php echo $row['student_guardian_name'];?></td>
                    <th>Guardian's Phone:</th>
                    <td><?php echo $row['student_guardian_phone'];?></td>
                    <th>Guardian's Email:</th>
                    <td><?php echo $row['student_guardian_email'];?></td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <th>Guardian's Profession:</th>
                    <td><?php echo $row['student_guardian_profession'];?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                <?php
                    }
                ?></tr>
                
            </table>
        </div>
    </div>
    <div class="container my-3">
        <button id="profile_pdf" class="btn btn-primary">Download as PDF</button>
        <button id="print_page" class="btn btn-secondary">Print Page</button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#profile_pdf").click(function() {
                let studentName = $("#studentName").html();
                let profile_sec = document.getElementById("profile_page");
                var opt = {
                    margin: 0.4,
                    html2canvas: {
                        scale: 2
                    },
                    filename: studentName + ".pdf",
                    image: {
                        type: 'png'
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'p'
                    },
                    pagebreak: {
                        mode: 'avoid-all'
                    },
                    enableLinks:false
                };
                html2pdf().set(opt).from(profile_sec).save();
            });

            $("#print_page").click(function() {
                window.print();
            });
        });

    </script>
</body>

</html>

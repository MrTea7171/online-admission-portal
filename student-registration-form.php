<?php
    session_start();
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date( "Y" );
    require 'includes/connection.php';
    /*if(!isset($_SESSION['user_enroll']))
    {
        header("Location:student-registration-verification.php");
    }*/
    $enroll=$_SESSION['user_enroll'];
    $stmt1 = $conn->prepare( "select * from student_confirm where enrollment_id=?" );
    $stmt1->bind_param( "s", $enroll);
    $stmt1->execute();
    $result = $stmt1->get_result();
    $count = $result->num_rows;
    $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Admission</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form_section {
            padding: 20px 0px;
            padding-bottom: 10px;
            border-bottom: 1px solid;
        }

        #top_section {
            border-top: 1px solid;
        }

        .form_section>h4 {
            font-size: 22px;
        }

    </style>
</head>

<body class="dark_green_bg">
    <div class="text-center mt-3">
        <h3 id="page_title">Registration Form</h3>
    </div>
    <div class="container box_model" id="register_box">
        <p class="text-center"><i>Please upload all documents except for passport photo in pdf format. Photo should be uploaded in jpeg format.</i></p>
        <form class="mt-3 col-12" id="register_student_form" name="register_student_form" enctype="multipart/form-data">
            <div class="form_section" id="top_section">
                <h4>Personal Details</h4>
                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="student_name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo $row['student_name']; ?>">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="dob" class="form-label">Date of birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="aadharNo" class="form-label">Aadhar Card No.:</label>
                        <input type="text" class="form-control" id="aadharNo" name="aadharNo">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="blood" class="form-label">Blood Group</label>
                        <select id="blood" class="form-control" name="blood">
                            <option value="" selected disabled>---Select Blood Group---</option>
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="AB+">AB+</option>
                            <option value="O+">O+</option>
                            <option value="A-">A-</option>
                            <option value="B-">B-</option>
                            <option value="AB-">AB-</option>
                            <option value="O-">O-</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" class="form-control" name="gender">
                            <option value="" selected disabled>---Select Gender---</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Transgender">Transgender</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" class="form-control" name="status">
                            <option value="" selected disabled>---Select Status---</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="studentReligion" class="form-label">Religion</label>
                        <select id="studentReligion" class="form-control" name="studentReligion">
                            <option value="" selected disabled>---Select Religion---</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Buddhist">Buddhist</option>
                            <option value="Christian">Christian</option>
                            <option value="Jain">Jain</option>
                            <option value="Sikh">Sikh</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="studentCaste" class="form-label">Caste</label>
                        <select id="studentCaste" class="form-control" name="studentCaste">
                            <option value="" selected disabled>---Select Caste---</option>
                            <option value="Open">Open</option>
                            <option value="OBC">OBC</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="studentEmail" class="form-label">Email Address:</label>
                        <input type="email" class="form-control" id="studentEmail" aria-describedby="emailHelp" name="studentEmail" value="<?php echo $row['email_id']; ?>" readonly>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="studentPhone" class="form-label">Phone:</label>
                        <input type="text" class="form-control" id="studentPhone" name="studentPhone">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="studentCurrentAddress" class="form-label">Current Address:</label>
                        <textarea type="text" class="form-control" id="studentCurrentAddress" name="studentCurrentAddress" rows="1"></textarea>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="studentPermanentAddress" class="form-label">Permanent Address:</label>
                        <textarea type="text" class="form-control" id="studentPermanentAddress" name="studentPermanentAddress" rows="1"></textarea>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="state" class="form-label">State (Permanent):</label>
                        <select name="state" id="state" name="state" class="form-control">
                            <option value="" selected disabled>---Select Caste---</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="district" class="form-label">District (Permanent):</label>
                        <input type="text" class="form-control" id="district" name="district">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="pincode" class="form-label">City (Permanent):</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="pincode" class="form-label">Pin Code (Permanent):</label>
                        <input type="text" class="form-control" id="pincode" name="pincode">
                    </div>
                </div>
            </div>
            <div class="form_section">
                <h4>Academic Details</h4>
                <div class="row">
                    <div class="col-12 my-3">
                        <div class="col-10">
                            <div class="row px-3 academic_checkbox_set">
                                <div class="form-check col-2">
                                    <input class="form-check-input" type="checkbox" checked onclick="return false;" name="student_academic[]" value="10">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        10<sup>th</sup> Standard
                                    </label>
                                </div>
                                <div class="form-check col-2">
                                    <input class="form-check-input academic_checkbox" type="checkbox" value="12<sup>th<sup>" id="student_twelfth" name="student_academic[]" value="12" checked>
                                    <label class="form-check-label" for="student_twelfth">
                                        12<sup>th</sup> Standard
                                    </label>
                                </div>
                                <div class="form-check col-2">
                                    <input class="form-check-input academic_checkbox" type="checkbox" id="student_diploma" name="student_academic[]" value="diploma">
                                    <label class="form-check-label" for="student_diploma">
                                        Diploma
                                    </label>
                                </div>
                                <div class="form-check col-6">
                                    <label class="form-check-label red_text hide_box" id="academic_checkbox_error">
                                        Please provide details of atleast one higher education
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tenthSchool" class="form-label">10<sup>th</sup> School:</label>
                        <input type="text" class="form-control" id="tenthSchool" name="tenthSchool">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tenthBoard" class="form-label">10<sup>th</sup> Board:</label>
                        <select id="tenthBoard" class="form-control" name="tenthBoard">
                            <option value="" selected disabled>---Select Board---</option>
                            <option value="State">State</option>
                            <option value="CBSE">CBSE</option>
                            <option value="ICSE">ICSE</option>
                            <option value="IGCSE">IGCSE</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tenthPercentage" class="form-label">10<sup>th</sup> Percentage/CGP:</label>
                        <input type="text" class="form-control" id="tenthPercentage" name="tenthPercentage">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tenthPassingYear" class="form-label">10<sup>th</sup> Passing Year:</label>
                        <input type="text" class="form-control" id="tenthPassingYear" name="tenthPassingYear">
                    </div>
                    <div class="mb-3 col-3 twelfth_field">
                        <label for="twelfthSchool" class="form-label">12<sup>th</sup> School:</label>
                        <input type="text" class="form-control" id="twelfthSchool" name="twelfthSchool">
                    </div>
                    <div class="mb-3 col-3 twelfth_field">
                        <label for="twelfthBoard" class="form-label">12<sup>th</sup> Board:</label>
                        <select id="twelfthBoard" class="form-control" name="twelfthBoard">
                            <option value="" selected disabled>---Select Board---</option>
                            <option value="State">State</option>
                            <option value="CBSE">CBSE</option>
                            <option value="ICSE">ICSE</option>
                            <option value="IGCSE">IGCSE</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3 col-3 twelfth_field">
                        <label for="twelfthPercentage" class="form-label">12<sup>th</sup> Percentage/CGP:</label>
                        <input type="text" class="form-control" id="twelfthPercentage" name="twelfthPercentage">
                    </div>
                    <div class="mb-3 col-3 twelfth_field">
                        <label for="twelfthPassingYear" class="form-label">12<sup>th</sup> Passing Year:</label>
                        <input type="text" class="form-control" id="twelfthPassingYear" name="twelfthPassingYear">
                    </div>
                    <div class="mb-3 col-3 diploma_field">
                        <label for="diplomaCollege" class="form-label">Diploma College:</label>
                        <input type="text" class="form-control" id="diplomaCollege" name="diplomaCollege">
                    </div>
                    <div class="mb-3 col-3 diploma_field">
                        <label for="diplomaDept" class="form-label">Diploma Department:</label>
                        <input type="text" class="form-control" id="diplomaDept" name="diplomaDept">
                    </div>
                    <div class="mb-3 col-3 diploma_field">
                        <label for="diplomaGrade" class="form-label">Diploma CGP:</label>
                        <input type="text" class="form-control" id="diplomaGrade" name="diplomaGrade">
                    </div>
                    <div class="mb-3 col-3 diploma_field">
                        <label for="diplomaPassingYear" class="form-label">Diploma Passing Year:</label>
                        <input type="text" class="form-control" id="diplomaPassingYear" name="diplomaPassingYear">
                    </div>
                </div>
            </div>
            <div class="form_section">
                <h4>Admission Details</h4>
                <div class="row">
                    <div class="my-3 col-12">
                        <input type="radio" id="online_addmission" name="addmission_mode" value="Online" checked>
                        <label for="online" class="form-label">Online</label>
                        &nbsp;
                        <input type="radio" id="offline_addmission" name="addmission_mode" value="Offline">
                        <label for="offline" class="form-label">Offline</label>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-3 online_field">
                            <label for="userCAP" class="form-label">CAP Application Id:</label>
                            <input type="text" class="form-control" id="userCAP" name="userCAP">
                        </div>
                        <div class="mb-3 col-3 online_field">
                            <label for="capfile" class="form-label">CAP File:</label>
                            <input type="file" class="form-control file_field" id="capfile" name="capfile">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="userDepartment" class="form-label">Department</label>
                            <select id="userDepartment" class="form-control" name="userDepartment">
                                <option value="" selected disabled>---Select Department---</option>
                                <?php
                        $stmt = $conn->prepare( "select * from student_department" );
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($row = $result->fetch_assoc())
                        {
                            echo '<option value="'.$row["department_id"].'">'.$row["department_name"].'</option>';
                        }
                        $stmt->close();
                    ?>
                            </select>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="admissionYear" class="form-label">Admission Year:</label>
                            <input type="text" class="form-control" id="admissionYear" name="admissionYear" value="<?php echo $date; ?>" readonly>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="admissionTo" class="form-label">Admission To:</label>
                            <select id="admissionTo" class="form-control" name="admissionTo">
                                <option value="" selected disabled>---Select Year---</option>
                                <option value="FE">First Year(FE)</option>
                                <option value="DSE">Direct Second Year(DSE)</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form_section">
                <h4>Parents Details</h4>
                <div class="row">
                    <div class="col-12 my-3">
                        <div class="col-10">
                            <div class="row px-3">
                                <div class="form-check col-2">
                                    <input class="form-check-input parents_checkbox" type="checkbox" value="Mother" id="parent_mother" name="parent[]" checked>
                                    <label class="form-check-label" for="parent_mother">
                                        Mother
                                    </label>
                                </div>
                                <div class="form-check col-2">
                                    <input class="form-check-input parents_checkbox" type="checkbox" value="Father" id="parent_father" name="parent[]" checked>
                                    <label class="form-check-label" for="parent_father">
                                        Father
                                    </label>
                                </div>
                                <div class="form-check col-2">
                                    <input class="form-check-input parents_checkbox" type="checkbox" value="Guardian" id="parent_guardian" name="parent[]">
                                    <label class="form-check-label" for="parent_guardian">
                                        Guardian
                                    </label>
                                </div>
                                <div class="form-check col-6">
                                    <label class="form-check-label red_text hide_box" id="parents_checkbox_error">
                                        Please provide details for atleast one guardian
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherName" class="form-label">Mother's Name:</label>
                        <input type="text" class="form-control" id="studentMotherName" name="studentMotherName">
                    </div>
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherPhone" class="form-label">Mother's Phone:</label>
                        <input type="text" class="form-control" id="studentMotherPhone" name="studentMotherPhone">
                    </div>
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherEmail" class="form-label">Mother's Email:</label>
                        <input type="text" class="form-control" id="studentMotherEmail" name="studentMotherEmail">
                    </div>
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherProfession" class="form-label">Mother's Profession:</label>
                        <input type="text" class="form-control" id="studentMotherProfession" name="studentMotherProfession">
                    </div>
                    <div class="mb-3 col-3 father_details">
                        <label for="studentFatherName" class="form-label">Father's Name:</label>
                        <input type="text" class="form-control" id="studentFatherName" name="studentFatherName">
                    </div>
                    <div class="mb-3 col-3 father_details">
                        <label for="studentFatherPhone" class="form-label">Father's Phone:</label>
                        <input type="text" class="form-control" id="studentFatherPhone" name="studentFatherPhone">
                    </div>
                    <div class="mb-3 col-3 father_details">
                        <label for="studentFatherEmail" class="form-label">Father's Email:</label>
                        <input type="text" class="form-control" id="studentFatherEmail" name="studentFatherEmail">
                    </div>
                    <div class="mb-3 col-3 father_details">
                        <label for="studentFatherProfession" class="form-label">Father's Profession:</label>
                        <input type="text" class="form-control" id="studentFatherProfession" name="studentFatherProfession">
                    </div>
                    <div class="mb-3 col-3 guardian_details">
                        <label for="studentGuardianName" class="form-label">Guardian's Name:</label>
                        <input type="text" class="form-control" id="studentGuardianName" name="studentGuardianName">
                    </div>
                    <div class="mb-3 col-3 guardian_details">
                        <label for="studentGuardianPhone" class="form-label">Guardian's Phone:</label>
                        <input type="text" class="form-control" id="studentGuardianPhone" name="studentGuardianPhone">
                    </div>
                    <div class="mb-3 col-3 guardian_details">
                        <label for="studentGuardianEmail" class="form-label">Guardian's Email:</label>
                        <input type="text" class="form-control" id="studentGuardianEmail" name="studentGuardianEmail">
                    </div>
                    <div class="mb-3 col-3 guardian_details">
                        <label for="studentGuardianProfession" class="form-label">Guardian's Profession:</label>
                        <input type="text" class="form-control" id="studentGuardianProfession" name="studentGuardianProfession">
                    </div>
                </div>
            </div>
            <div class="form_section">
                <h4>Documents Required</h4>
                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="passportPhoto" class="form-label">Passport Photo:</label>
                        <input type="file" class="form-control" id="passportPhoto" name="passportPhoto" accept="image/jpeg,image/x-png" data-msg-accept="Only JPEG,PNG file format accepted.">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="birthCertificate" class="form-label">Birth Certicate:</label>
                        <input type="file" class="form-control" id="birthCertificate" name="birthCertificate" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="aadharCardfile" class="form-label">Aadhar Card:</label>
                        <input type="file" class="form-control" id="aadharCardfile" name="aadharCardfile" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="panCardfile" class="form-label">Pan Card:</label>
                        <input type="file" class="form-control" id="panCardfile" name="panCardfile" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3 casteField">
                        <label for="casteCertificate" class="form-label">Caste Certificate:</label>
                        <input type="file" class="form-control file_field" id="casteCertificate" name="casteCertificate" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3 casteField">
                        <label for="incomeCertificate" class="form-label">Income Certificate:</label>
                        <input type="file" class="form-control file_field" id="incomeCertificate" name="incomeCertificate" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tenthMarksheet" class="form-label">10th Marksheet:</label>
                        <input type="file" class="form-control" id="tenthMarksheet" name="tenthMarksheet" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tenthLeavingCertificate" class="form-label">10th Leaving Certificate:</label>
                        <input type="file" class="form-control" id="tenthLeavingCertificate" name="tenthLeavingCertificate" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3 twelfth_field">
                        <label for="twelfthMarksheet" class="form-label">12th Marksheet:</label>
                        <input type="file" class="form-control file_field" id="twelfthMarksheet" name="twelfthMarksheet" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3 twelfth_field">
                        <label for="twelfthLeavingMarksheet" class="form-label">12th Leaving Certificate:</label>
                        <input type="file" class="form-control file_field" id="twelfthLeavingMarksheet" name="twelfthLeavingMarksheet" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3 diploma_field">
                        <label for="diplomaMarksheet" class="form-label">Diploma Marksheet:</label>
                        <input type="file" class="form-control file_field" id="diplomaMarksheet" name="diplomaMarksheet" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3 diploma_field">
                        <label for="diplomaLeavingCertificate" class="form-label">Diploma Leaving Certificate:</label>
                        <input type="file" class="form-control file_field" id="diplomaLeavingCertificate" name="diplomaLeavingCertificate" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="antiRaggingAffidavite" class="form-label">Anti-Ragging Affidavite</label>
                        <input type="file" class="form-control" id="antiRaggingAffidavite" name="antiRaggingAffidavite" accept="application/pdf" data-msg-accept="Only PDF file format accepted.">
                    </div>
                </div>
            </div>
            <div class="form_section mb-3">
                <h4>Account Details</h4>
                <div class="row">
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherName" class="form-label">Enrollment No:</label>
                        <input type="text" class="form-control" id="enrollmentno" name="enrollmentno" value="<?php echo $enroll; ?>" readonly>
                    </div>
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherPhone" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="student_password" name="student_password">
                    </div>
                    <div class="mb-3 col-3 mother_details">
                        <label for="studentMotherEmail" class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                </div>
            </div>
            <button type="submit" name="register_student_btn" id="register_student_btn" class="btn btn-success dark_green_bg" value="register_student">Submit Form</button>
            <button type="reset" class="btn btn-secondary">Reset Form</button>
        </form>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
        require("includes/FormLib.php");
    ?>
    <script src="js/registration.js"></script>
</body>

</html>

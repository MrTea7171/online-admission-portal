<?php
    session_start();
    require 'connection.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date( "Y-m-d H:i:s" );
    $enroll=$_SESSION['user_enroll'];
    if(isset($_POST["register_student_btn"]))
    {
        $ien='';
        $file_path= "../student_data/".$enroll."/";
        if (!file_exists($file_path)) 
        {
            mkdir($file_path, 0777, true);
        }
        if(isset($_FILES['passportPhoto'])) 
        {
            $ext = explode('.', basename($_FILES['passportPhoto']['name']));
            $file_extension = end($ext);
            $file_name=$enroll.".".$file_extension;
            move_uploaded_file($_FILES['passportPhoto']['tmp_name'],$file_path.$file_name);
            $passport_photo=$enroll."/".$file_name;
        }
        else
        {
            $passport_photo="img/no-image.png";
        }
        if(isset($_FILES['birthCertificate'])) 
        {
            $ext = explode('.', basename($_FILES['birthCertificate']['name']));
            $file_extension = end($ext);
            $file_name=$enroll."-Birth.".$file_extension;
            move_uploaded_file($_FILES['birthCertificate']['tmp_name'],$file_path.$file_name);
            $birth_certificate=$enroll."/".$file_name;
        }
        else
        {
            $birth_certificate="img/no-image.png";
        }
        if(isset($_FILES['aadharCardfile'])) 
        {
            $ext = explode('.', basename($_FILES['aadharCardfile']['name']));
            $file_extension = end($ext);
            $file_name=$enroll."-Aadhar.".$file_extension;
            move_uploaded_file($_FILES['aadharCardfile']['tmp_name'],$file_path.$file_name);
            $aadhar_cardfile=$enroll."/".$file_name;
        }
        else
        {
            $aadhar_cardfile="img/no-image.png";
        }
        if(isset($_FILES['panCardfile'])) 
        {
            $ext = explode('.', basename($_FILES['panCardfile']['name']));
            $file_extension = end($ext);
            $file_name=$enroll."-Pan.".$file_extension;
            move_uploaded_file($_FILES['panCardfile']['tmp_name'],$file_path.$file_name);
            $pan_cardfile=$enroll."/".$file_name;
        }
        else
        {
            $pan_cardfile="img/no-image.png";
        }
        if(isset($_FILES['casteCertificate'])) 
        {
            $ext = explode('.', basename($_FILES['casteCertificate']['name']));
            $file_extension = end($ext);
            $file_name=$enroll."-Caste.".$file_extension;
            move_uploaded_file($_FILES['casteCertificate']['tmp_name'],$file_path.$file_name);
            $caste_certificate=$enroll."/".$file_name;
        }
        else
        {
            $caste_certificate="img/no-image.png";
        }
        
        if(isset($_FILES['incomeCertificate'])) 
        {
            $ext = explode('.', basename($_FILES['incomeCertificate']['name']));
            $file_extension = end($ext);
            $file_name=$enroll."-Income.".$file_extension;
            move_uploaded_file($_FILES['incomeCertificate']['tmp_name'],$file_path.$file_name);
            $income_certificate=$enroll."/".$file_name;
        }
        else
        {
            $income_certificate="img/no-image.png";
        }
        
        
        $stmt1 = $conn->prepare( "insert into student_personal(enrollment_no,student_ien,student_fname, student_blood, student_dob, student_aadhar, student_gender, student_status, student_religion, student_caste, student_email, student_phone, student_caddress, student_paddress, student_pincode, student_state, student_district, student_passport_pic, student_birth_card, student_aadhar_file, student_pan_file, student_caste_certificate, student_income_file, student_last_updated) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );
            $stmt1->bind_param("ssssssssssssssssssssssss", $enroll, $ien, $_POST['student_name'], $_POST['blood'], $_POST['dob'], $_POST['aadharNo'], $_POST['gender'], $_POST['status'], $_POST['studentReligion'], $_POST['studentCaste'], $_POST['studentEmail'], $_POST['studentPhone'], $_POST['studentCurrentAddress'], $_POST['studentPermanentAddress'], $_POST['pincode'], $_POST['state'], $_POST['district'], $passport_photo, $birth_certificate, $aadhar_cardfile, $pan_cardfile, $caste_certificate, $income_certificate, $date);
            $stmt1->execute();
            //echo("Error description: " . $stmt1 -> error);
            $affected = $stmt1->affected_rows;
            $student_id = $conn->insert_id;
            $stmt1->close();
            if ( $affected>0 ) 
            {
                if(isset($_FILES['tenthMarksheet'])) 
                {
                    $ext = explode('.', basename($_FILES['tenthMarksheet']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-TenthMarksheet.".$file_extension;
                    move_uploaded_file($_FILES['tenthMarksheet']['tmp_name'],$file_path.$file_name);
                    $tenth_marksheet=$enroll."/".$file_name;
                }
                else
                {
                    $tenth_marksheet="img/no-image.png";
                }
                
                if(isset($_FILES['tenthLeavingCertificate'])) 
                {
                    $ext = explode('.', basename($_FILES['tenthLeavingCertificate']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-TenthLeaving.".$file_extension;
                    move_uploaded_file($_FILES['tenthLeavingCertificate']['tmp_name'],$file_path.$file_name);
                    $tenth_leaving_certificate=$enroll."/".$file_name;
                }
                else
                {
                    $tenth_leaving_certificate="img/no-image.png";
                }
                
                if(isset($_FILES['twelfthMarksheet'])) 
                {
                    $ext = explode('.', basename($_FILES['twelfthMarksheet']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-TwelfthMarksheet.".$file_extension;
                    move_uploaded_file($_FILES['twelfthMarksheet']['tmp_name'],$file_path.$file_name);
                    $twelfth_marksheet=$enroll."/".$file_name;
                }
                else
                {
                    $twelfth_marksheet="img/no-image.png";
                }
                
                if(isset($_FILES['twelfthLeavingMarksheet'])) 
                {
                    $ext = explode('.', basename($_FILES['twelfthLeavingMarksheet']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-TwelfthLeavingMarksheet.".$file_extension;
                    move_uploaded_file($_FILES['twelfthLeavingMarksheet']['tmp_name'],$file_path.$file_name);
                    $twelfth_leaving_marksheet=$enroll."/".$file_name;
                }
                else
                {
                    $twelfth_leaving_marksheet="img/no-image.png";
                }
                
                if(isset($_FILES['diplomaMarksheet'])) 
                {
                    $ext = explode('.', basename($_FILES['diplomaMarksheet']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-DiplomaMarksheet.".$file_extension;
                    move_uploaded_file($_FILES['diplomaMarksheet']['tmp_name'],$file_path.$file_name);
                    $diploma_marksheet=$enroll."/".$file_name;
                }
                else
                {
                    $diploma_marksheet="img/no-image.png";
                }
                
                if(isset($_FILES['diplomaLeavingCertificate'])) 
                {
                    $ext = explode('.', basename($_FILES['diplomaLeavingCertificate']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-Income.".$file_extension;
                    move_uploaded_file($_FILES['DiplomaLeavingCertificate']['tmp_name'],$file_path.$file_name);
                    $diplomaLeavingCertificate=$enroll."/".$file_name;
                }
                else
                {
                    $diplomaLeavingCertificate="img/no-image.png";
                }
                    
                if(isset($_FILES['capfile'])) 
                {
                    $ext = explode('.', basename($_FILES['capfile']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-AntiRaggingAffidavite.".$file_extension;
                    move_uploaded_file($_FILES['capfile']['tmp_name'],$file_path.$file_name);
                    $cap_file=$enroll."/".$file_name;
                }
                else
                {
                    $cap_file="img/no-image.png";
                }
                
                if(isset($_FILES['antiRaggingAffidavite'])) 
                {
                    $ext = explode('.', basename($_FILES['antiRaggingAffidavite']['name']));
                    $file_extension = end($ext);
                    $file_name=$enroll."-AntiRaggingAffidavite.".$file_extension;
                    move_uploaded_file($_FILES['antiRaggingAffidavite']['tmp_name'],$file_path.$file_name);
                    $anti_ragging_affidavite=$enroll."/".$file_name;
                }
                else
                {
                    $anti_ragging_affidavite="img/no-image.png";
                }
                
                $academics=implode(",",$_POST["student_academic"]);
                $stmt1 = $conn->prepare( "insert into student_academic_details(student_id, academic_details_of, student_tenth_school, student_tenth_board, student_tenth_percentage, student_tenth_passyear, student_twelfth_school, student_twelfth_board, student_twelfth_percentage, student_twelfth_passyear, student_diploma_college, student_diploma_department, student_diploma_cgp, student_diploma_passyear, student_tenth_marksheet, student_tenth_leaving_certificate, student_twelfth_marksheet, student_twelfthh_leaving_certificate, student_diploma_marksheet, student_diploma_leaving_certificate, student_last_updated) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );

                $stmt1->bind_param( "sssssssssssssssssssss", $student_id, $academics,$_POST['tenthSchool'],$_POST['tenthBoard'],$_POST['tenthPercentage'],$_POST['tenthPassingYear'],$_POST['twelfthSchool'],$_POST['twelfthBoard'],$_POST['twelfthPercentage'],$_POST['twelfthPassingYear'], $_POST['diplomaCollege'], $_POST['diplomaDept'], $_POST['diplomaGrade'], $_POST['diplomaPassingYear'], $tenth_marksheet, $tenth_leaving_certificate, $twelfth_marksheet, $twelfth_leaving_marksheet, $diploma_marksheet, $diplomaLeavingCertificate, $date);
                
                $stmt1->execute();
                $affected = $stmt1->affected_rows;
                $stmt1->close();
                
                $stmt1 = $conn->prepare("insert into student_college_details(student_id, student_addmission_mode, student_cap_id, student_cap_document, student_department, student_admission_year, student_admission_to, student_antirag_doc, college_details_last_updated) values (?,?,?,?,?,?,?,?,?)");
                
                $stmt1->bind_param( "sssssssss", $student_id, $_POST['addmission_mode'], $_POST['userCAP'], $cap_file, $_POST['userDepartment'], $_POST['admissionYear'], $_POST['admissionTo'], $anti_ragging_affidavite, $date);
                
                $stmt1->execute();
                $affected = $stmt1->affected_rows;
                $stmt1->close();
                
                $parents=implode(",",$_POST["parent"]);
                $stmt1 = $conn->prepare("insert into student_parents_details(student_id, student_details_of, student_mother_name, student_mother_phone, student_mother_email, student_mother_profession, student_father_name, student_father_phone, student_father_email, student_father_profession, student_guardian_name, student_guardian_phone, student_guardian_email, student_guardian_profession, parent_detail_last_updated) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                
                $stmt1->bind_param( "sssssssssssssss", $student_id, $parents, $_POST['studentMotherName'], $_POST['studentMotherPhone'], $_POST['studentMotherEmail'], $_POST['studentMotherProfession'], $_POST['studentFatherName'], $_POST['studentFatherPhone'], $_POST['studentFatherEmail'], $_POST['studentFatherProfession'], $_POST['studentGuardianName'], $_POST['studentGuardianPhone'], $_POST['studentGuardianEmail'], $_POST['studentGuardianProfession'], $date);
                
                $stmt1->execute();
                $affected = $stmt1->affected_rows;
                $stmt1->close();
                
                $stmt1 = $conn->prepare("insert into student_accounts(student_id, student_password, student_account_last_updated) values (?,?,?)");
                
                $stmt1->bind_param( "sss", $student_id, $_POST['student_password'], $date);
                
                $stmt1->execute();
                $affected = $stmt1->affected_rows;
                $stmt1->close();
                
                $batch=$_POST['admissionYear'].'-'.($_POST['admissionYear']+1);
                $status="Pending";
                $stmt1 = $conn->prepare("insert into payment_status(student_id, batch, year, status, date_updated) values (?,?,?,?,?)");
                
                $stmt1->bind_param( "sssss", $student_id, $batch, $_POST['admissionTo'], $status, $date);
                
                $stmt1->execute();
                $affected = $stmt1->affected_rows;
                $stmt1->close();

                echo "success";
            }
            else
            {
                echo "error";
            }
    }
?>
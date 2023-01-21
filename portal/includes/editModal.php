<?php
require '../../includes/connection.php';
date_default_timezone_set( 'Asia/Kolkata' );
$date = date( "Y-m-d H:i:s" );

function selected($op1,$op2)
{
    if($op1==$op2)
    {
        return "selected";
    }
} 

function checked_array($item, $arr)
{
    if(in_array($item,$arr))
    {
        return "checked";
    }
} 

if ( isset( $_POST["EditDepartment"] ) ) {
    $id = $_POST['Department_id'];
    $stmt1 = $conn->prepare( "select * from student_department where department_id=?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="editDepartment_form">
                <div class="mb-3">
                    <input type="hidden" id="editDepartmentId" name="editDepartmentId" value="'.$row["department_id"].'">
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="editDepartment" class="form-label">Department Name:</label>
                        <input type="text" class="form-control" id="editDepartment" name="editDepartment" value="'.$row["department_name"].'">
                    </div>
                    <div class="col-md-6">
                        <label for="department_code">Department Code</label>
                        <input type="text" class="form-control" id="department_code" name="department_code" value="'.$row["department_code"].'">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="department_short">Department Shortform</label>
                        <input type="text" class="form-control" id="department_short" name="department_short" value="'.$row["department_short"].'">
                    </div>
                    </div>
                    <button type="submit" name="editDepartment_btn" class="btn btn-primary" id="editDepartment_btn" value="editDepartment">Save Changes</button>
                </div>
            </form>
            ';
    }
}

if ( isset( $_POST["EditOffer"] ) ) {
    $id = $_POST['Offer_id'];
    $stmt1 = $conn->prepare( "select * from college_placement_offers where cpo_id=?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="editCpoOffersform" enctype="multipart/form-data">
            <div class="mb-3">
                <div class="row">
                    <input type="hidden" name="cpo_id" value="'.$row['cpo_id'].'">
                    <input type="hidden" id="cpo_img" name="cpo_img" value="'.$row['cpo_logo'].'">
                    <div class="col-md-6 mb-3">
                        <label for="cpo_name">Company Name</label>
                        <input type="text" class="form-control" id="cpo_name" name="cpo_name" value="'.$row['cpo_name'].'">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cpo_description">Company Description</label>
                        <textarea class = "form-control" name="cpo_description" id="cpo_description">'.$row['cpo_description'].'</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpo_role">Role</label>
                        <input type="text" class="form-control" id="cpo_role" name="cpo_role" value="'.$row['cpo_role'].'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpo_salary">Salary</label>
                        <input type="text" class="form-control" id="cpo_salary" name="cpo_salary" value="'.$row['cpo_salary'].'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpo_link">Link to Apply</label>
                        <input type="text" class="form-control" id="cpo_link" name="cpo_link" value="'.$row['cpo_link'].'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="cpo_ldate">Last Date</label>
                        <input type="datetime-local" class="form-control" id="cpo_ldate" name="cpo_ldate" value="'.strftime('%Y-%m-%dT%H:%M:%S', strtotime($row['cpo_ldate'])).'">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="cpo_logo">Company Logo</label>
                        <input type="file" class="form-control" id="cpo_logo" name="cpo_logo" accept="image/*">
                    </div>
                    <div class="col-md-12 mb-3">
                        <img src="../img/'.$row['cpo_logo'].'" height="100px">
                    </div>
                </div>
                <button type="submit" name="editCpoOffers_btn" class="btn btn-primary mt-3 d-block" id="editCpoOffers_btn" value="editCpoOffers_btn">Edit Placement Offer</button>
            </div>
        </form>            ';
    }
}

if ( isset( $_POST["EditConfirm"] ) ) {
    $id = $_POST['confirm_id'];
    $stmt1 = $conn->prepare( "select * from student_confirm where confirm_id=?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="editConfirm_form">
                <div class="mb-3">
                    <input type="hidden" id="editConfirmId" name="editConfirmId" value="'.$row["confirm_id"].'">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="editStudentName" class="form-label">Student Name:</label>
                            <input type="text" class="form-control" id="editStudentName" name="editStudentName" value="'.$row["student_name"].'">
                        </div>
                        <div class="col-md-4">
                            <label for="editStudentCap" class="form-label">Student Cap Id:</label>
                            <input type="text" class="form-control" id="editStudentCap" name="editStudentCap" value="'.$row["cap_id"].'">
                        </div>
                        <div class="col-md-4">
                            <label for="editStudentEmail" class="form-label">Student Email:</label>
                            <input type="text" class="form-control" id="editStudentEmail" name="editStudentEmail" value="'.$row["email_id"].'">
                        </div>
                    </div>
                    <button type="submit" name="editConfirm_btn" class="btn btn-primary" id="editConfirm_btn" value="editConfirm">Save Changes</button>
                </div>
            </form>
            ';
    }
}


if ( isset( $_POST["EditFees"] ) ) {
    $id = $_POST['Fees_id'];
    $stmt1 = $conn->prepare("select * from student_fees where fee_no=?");
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="editFees_form">
                <div class="mb-3">
                    <input type="hidden" id="editFeeId" name="editFeeId" value="'.$row["fee_no"].'">
                    <div class="row mb-3">
                        <div class="col-md-4 mb-3">
                            <label for="batch">Batch</label>
                            <input type="text" class="form-control" id="batch" name="batch" value="'.$row['batch'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="year">Year</label>
                            <select class="form-control" id="year" name="year">
                                <option value="" selected disabled hidden>----Select Year----</option>
                                <option value="FE" '.selected($row['year'],"FE").' >FE</option>
                                <option value="DSE" '.selected($row['year'],"DSE").' >DSE</option>
                                <option value="SE" '.selected($row['year'],"SE").' >SE</option>
                                <option value="TE" '.selected($row['year'],"TE").' >TE</option>
                                <option value="BE" '.selected($row['year'],"BE").' >BE</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="caste">Caste</label>
                            <select class="form-control" id="caste" name="caste">
                                <option value="" selected disabled hidden>----Select Caste----</option>
                                <option value="Open" '.selected($row['caste'],"Open").'>Open</option>
                                <option value="OBC" '.selected($row['caste'],"OBC").'>OBC</option>
                                <option value="ST/SC/NTB/Others">ST/SC/NTB/Others</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="tution_fees">Tution Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="tution_fees" name="tution_fees" value="'.$row['tution_fee'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="development_fees">Development Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="development_fees" name="development_fees" value="'.$row['development_fee'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="other_fees">Other Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="other_fees" name="other_fees" value="'.$row['other_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="caution_money">Caution Money</label>
                            <input type="text" class="form-control edit_fee_input" id="caution_money" name="caution_money" value="'.$row['caution_money'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="enrollment_fees">Enrollment Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="enrollment_fees" name="enrollment_fees" value="'.$row['enrollment_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="form_fees">Form Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="form_fees" name="form_fees" value="'.$row['form_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sports_fees">Sports Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="sports_fees" name="sports_fees" value="'.$row['sports_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="cultural_fees">Cultural Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="cultural_fees" name="cultural_fees" value="'.$row['cultural_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="relief_fund">Relief Fund</label>
                            <input type="text" class="form-control edit_fee_input" id="relief_fund" name="relief_fund" value="'.$row['relief_fund'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="gymkhana_fees">Gymkhana Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="gymkhana_fees" name="gymkhana_fees" value="'.$row['gym_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="e_charges">E Charges</label>
                            <input type="text" class="form-control edit_fee_input" id="e_charges" name="e_charges" value="'.$row['e_charges'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="yuvia_fees">Yuvia Fees</label>
                            <input type="text" class="form-control edit_fee_input" id="yuvia_fees" name="yuvia_fees" value="'.$row['yuvia_fees'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="others">Others</label>
                            <input type="text" class="form-control edit_fee_input" id="others" name="others" value="'.$row['others'].'">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="total_fees">Total Fees</label>
                            <input type="text" class="form-control" id="edit_total_fees" name="total_fees" value="'.$row['total_fees'].'" readonly>
                        </div> 
                            <button type="submit" name="editFee_btn" class="btn btn-primary" id="editFee_btn" value="editFees">Save Changes</button>
                    </div>
                </form>
            ';
    }
}

if ( isset( $_POST['ReviewModal'] ) ) {
    $id = $_POST['ReviewId'];
    $stmt1 = $conn->prepare( "select admission_status, admission_remark from student_college_details where student_id =?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="review_form" action="edit.php" method="post">
                <div class="row">
                    <input type="hidden" name="student_status" value="Yes">
                    <input type="hidden" name="student" value="'.$id.'">
                    <div class="mb-3 col-12">
                        <label for="admission_status" class="form-label">Admission Status:</label>
                        <select name="admission_status" id="admission_status" class="form-control">
                            <option value="Applied"  '.selected("Applied",$row['admission_status']).'>Applied</option>
                            <option value="Verified" '.selected("Verified",$row['admission_status']).'>Verified</option>
                            <option value="Resubmit" '.selected("Resubmit",$row['admission_status']).'>Resubmit</option>
                        </select>
                    </div>
                    <div class="mb-3 col-12">
                        <label for="student_remark" class="form-label">Remark:</label>
                        <textarea name="student_remark" id="student_remark" cols="30" rows="4" class="form-control">'.$row['admission_remark'].'</textarea>
                    </div>
                    <div class="mb-3 col-12">
                        <button id="review_submit" name="review_submit" class="d-block btn btn-success w-100">Submit</button>
                    </div>
                </div>
            </form>
            ';
    }
}
    if ( isset( $_POST['EditFaculty'] ) ) {
    $id = $_POST['FacultyId'];
    $stmt1 = $conn->prepare( "select * from faculty where faculty_id =?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="edit_facultyform" method="post">
                <div class="row">
                    <input type="hidden" name="edit_faculty" value="Yes">
                    <input type="hidden" name="faculty_id" value="'.$id.'">
                    <div class="mb-3 col-12">
                        <label for="addFaculty">Faculty Name</label>
                        <input type="text" class="form-control" id="faculty_name" name="faculty_name" value="'.$row['faculty_name'].'">
                    </div>
                    <div class="col-md-6">
                        <label for="addFaculty">Faculty Phone</label>
                        <input type="text" class="form-control" id="faculty_phone" name="faculty_phone" value="'.$row['faculty_phone'].'">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="addFaculty">Faculty Email</label>
                        <input type="text" class="form-control" id="faculty_email" name="faculty_email" value="'.$row['faculty_email_id'].'">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="addFaculty">Faculty Branch</label>
                        <select class="form-control" id="faculty_branch" name="faculty_branch">';
                        $stmt = $conn->prepare( "select * from student_department" );
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($row2 = $result->fetch_assoc())
                        {
                            echo '<option value="'.$row2["department_id"].'" '.selected($row2["department_id"],$row['faculty_branch']).'>'.$row2["department_name"].'</option>';
                        }
                        $stmt->close();
                        echo '
                        </select>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="addFaculty">Faculty Roles</label>
                        <div class="row">';
                            $roles=explode(",",$row["faculty_roles"]);
                            $stmt = $conn->prepare( "select * from roles" );
                            $stmt->execute();
                            $result2 = $stmt->get_result();
                            $i=0;
                            while($row2 = $result2->fetch_assoc())
                            {
                            
                                
                                   echo' <div class="col-md-6">
                                        <input type="checkbox" value="'.$row2['role_id'].'" '.checked_array($row2['role_id'],$roles).' name="faculty_roles[]" id="role<?php echo $i; ?>">
                                        <label for="role<?php echo $i; ?>">'.$row2['role_name'].'</label>
                                    </div>';
                                
                                $i++;
                            }
                            $stmt->close();
                        echo'
                        </div>
                    </div>
                    <div class="mb-3 col-12">
                        <button id="edit_facultybtn" name="edit_faculty_btn" class="d-block btn btn-success w-100" value="edit_facultybtn">Submit Changes</button>
                    </div>
                </div>
            </form>
            ';
    }
}

 if ( isset( $_POST['EditSubject'] ) ) {
    $id = $_POST['SubjectId'];
    $stmt1 = $conn->prepare( "select * from subjects where subject_id =?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="edit_subjectform" method="post">
                <div class="row">
                    <input type="hidden" name="edit_subject" value="Yes">
                    <input type="hidden" name="subject_id" value="'.$id.'">
                    <div class="mb-3 col-12">
                        <label for="subject_name">Subject Name</label>
                        <input type="text" class="form-control" id="subject_name" name="subject_name" value="'.$row['subject_name'].'">
                    </div>
                    <div class="mb-3 col-12">
                        <label for="subject_branch">Subject Branch</label>
                        <select class="form-control" id="subject_branch" name="subject_branch">';
                        $stmt = $conn->prepare( "select * from student_department" );
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while($row2 = $result->fetch_assoc())
                        {
                            echo '<option value="'.$row2["department_id"].'" '.selected($row2["department_id"],$row['faculty_branch']).'>'.$row2["department_name"].'</option>';
                        }
                        $stmt->close();
                        echo '
                        </select>
                    </div>
                    <div class="mb-3 col-12">
                        <button id="edit_subjectbtn" name="edit_subject_btn" class="d-block btn btn-success w-100" value="edit_submitbtn">Submit Changes</button>
                    </div>
                </div>
            </form>
            ';
    }
}

 if ( isset( $_POST['EditCourse'] ) ) {
    $id = $_POST['CourseId'];
    $stmt1 = $conn->prepare( "select * from courses where course_id =?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="edit_courseform" method="post">
                <div class="row">
                    <input type="hidden" name="edit_course" value="Yes">
                    <input type="hidden" name="course_id" value="'.$id.'">
                    <div class="col-md-12 mb-3">
                        <label for="course_class">Course Class</label>
                        <select class="form-control course_class" id="course_class" name="course_class">
                            <option value="" selected disabled>---Select Class---</option>';
                                    $stmt = $conn->prepare( "select * from classes" );
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row2 = $result->fetch_assoc())
                                    {
                                        echo '<option value="'.$row2["class_id"].'" '.selected($row2["class_id"],$row['course_class']).'>'.$row2["class_name"].'</option>';
                                    }
                                    $stmt->close();
                        echo '</select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="course_faculty">Course Faculty</label>
                        <select class="form-control course_faculty" id="course_faculty" name="course_faculty">';
                            $stmt = $conn->prepare( "select faculty_id, faculty_name from faculty f inner join classes c on c.class_branch=f.faculty_branch where c.class_id=?" );
                            $stmt->bind_param('s',$row['course_class']);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while($row2 = $result->fetch_assoc())
                            {
                                echo '<option value="'.$row2["faculty_id"].'" '.selected($row2["faculty_id"],$row['course_faculty']).'>'.$row2["faculty_name"].'</option>';
                            }
                            $stmt->close();
                        echo '</select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="course_subject">Course Subject</label>
                        <select class="form-control" id="course_subject course_subject" name="course_subject">';
                        $stmt = $conn->prepare( "select subject_id, subject_name from subjects s inner join classes c on c.class_branch=s.subject_branch where c.class_id=?" );
                            $stmt->bind_param('s',$row['course_class']);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            while($row2 = $result->fetch_assoc())
                            {
                                echo '<option value="'.$row2["subject_id"].'" '.selected($row2["subject_id"],$row['course_subject']).'>'.$row2["subject_name"].'</option>';
                            }
                            $stmt->close();
                        echo'</select>
                    </div>
                    <div class="mb-3 col-12">
                        <button id="edit_coursebtn" name="edit_coursebtn" class="d-block btn btn-success w-100" value="edit_submitbtn">Submit Changes</button>
                    </div>
                </div>
            </form>
            ';
    }
}

 if ( isset( $_POST['EditClass'] ) ) {
    $id = $_POST['ClassId'];
    $stmt1 = $conn->prepare( "select * from classes where class_id =?" );
    $stmt1->bind_param( "i", $id );
    $stmt1->execute();
    $result_select = $stmt1->get_result();
    $count_select = $result_select ->num_rows;
    $row = $result_select ->fetch_assoc();
    $stmt1->close();
    if ( $count_select>0 ) {
        echo'
            <form id="edit_classform" method="post">
                <div class="row">
                    <input type="hidden" name="edit_class" value="Yes">
                    <input type="hidden" name="class_id" value="'.$id.'">
                    <div class="col-md-6 mb-3">
                        <label for="class_branch">Class Branch</label>
                        <select class="form-control class_branch" id="class_branch" name="class_branch">
                            <option value="" selected disabled>---Select Department---</option>';
                                    $stmt = $conn->prepare( "select * from student_department" );
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    while($row2 = $result->fetch_assoc())
                                    {
                                        echo '<option value="'.$row2["department_id"].'"  id="'.$row2["department_short"].'" '.selected($row2["department_id"],$row['class_branch']).'>'.$row2["department_name"].'</option>';
                                    }
                                    $stmt->close();
                        echo '</select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="class_batch">Class Batch</label>
                        <input type="text" class="form-control class_batch" id="class_batch" name="class_batch" value="'.$row["class_batch"].'">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="class_year">Class Year</label>
                        <select class="form-control class_year" id="class_year" name="class_year">
                            <option value="" selected disabled>---Select Year---</option>
                            <option value="FE" '.selected('FE',$row['class_year']).'>FE</option>
                            <option value="SE" '.selected('SE',$row['class_year']).'>SE</option>
                            <option value="TE" '.selected('TE',$row['class_year']).'>TE</option>
                            <option value="BE" '.selected('BE',$row['class_year']).'>BE</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="class_sem">Class Sem</label>
                        <select class="form-control" id="class_sem" name="class_sem">
                            <option value="" selected disabled>---Select Semester---</option>
                            <option value="I" '.selected('I',$row['class_sem']).'>I</option>
                            <option value="II" '.selected('II',$row['class_sem']).'>II</option>
                            <option value="III" '.selected('III',$row['class_sem']).'>III</option>
                            <option value="IV" '.selected('IV',$row['class_sem']).'>IV</option>
                            <option value="V" '.selected('V',$row['class_sem']).'>V</option>
                            <option value="VI" '.selected('VI',$row['class_sem']).'>VI</option>
                            <option value="VII" '.selected('VII',$row['class_sem']).'>VII</option>
                            <option value="VIII" '.selected('VIII',$row['class_sem']).'>VIII</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="class_name">Class Name</label>
                        <input type="text" class="form-control class_name" id="class_name" name="class_name" readonly value="'.$row["class_name"].'">
                    </div>
                    <div class="mb-3 col-12">
                        <button id="edit_classbtn" name="edit_classbtn" class="d-block btn btn-success w-100" value="edit_submitbtn">Submit Changes</button>
                    </div>
                </div>
            </form>
            ';
    }
}
?>

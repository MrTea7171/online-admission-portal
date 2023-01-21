<?php
    require 'connection.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date( "Y-m-d H:i:s" );
function selected($op1,$op2)
{
    if($op1==$op2)
    {
        return "selected";
    }
}
    
    if ( isset( $_POST["EditExp"] ) ) {
        $id=$_POST["ExpId"];
        $stmt = $conn->prepare( "select * from student_work_exp where wexp_id=?" );
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $row = $result->fetch_assoc();
        echo '
            <form id="editworkexp_form" enctype="multipart/form-data">
                        <input type="hidden" name="wexp_id" value="'.$row['wexp_id'].'">
                        <input type="hidden" name="wexp_clogo" value="'.$row['wexp_company_logo'].'">
                        <input type="hidden" name="wexp_coffer" value="'.$row['wexp_offer_letter'].'">
                        <input type="hidden" name="wexp_cexp" value="'.$row['wexp_exp_letter'].'">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="exp_type" class="form-label">Experience Type:</label>
                                <select class="form-control" name="exp_type" id="exp_type">
                                    <option value="Placement" '.selected($row['wexp_type'],'Placement').'>Placement</option>
                                    <option value="Internship" '.selected($row['wexp_type'],'Internship').'>Internship</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_logo" class="form-label">Company Logo</label>
                                <input type="file" class="form-control" id="company_logo" name="company_logo">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="'.$row['wexp_company_name'].'">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="company_description" class="form-label">Company Description</label>
                                <textarea type="text" class="form-control" id="company_description" name="company_description">'.$row['wexp_company_description'].'</textarea>
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_link" class="form-label">Company Link</label>
                                <input type="text" class="form-control" id="company_link" name="company_link" value="'.$row['wexp_company_link'].'">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_contact" class="form-label">Company Contact</label>
                                <input type="text" class="form-control" id="company_contact" name="company_contact" value="'.$row['wexp_company_contact'].'">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_pay" class="form-label">Salary/Stipend</label>
                                <input type="text" class="form-control" id="company_pay" name="company_pay" value="'.$row['wexp_company_salary'].'">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="company_role" class="form-label">Role</label>
                                <input type="text" class="form-control" id="company_role" name="company_role" value="'.$row['wexp_company_role'].'">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="'.strftime('%Y-%m-%d', strtotime($row['wexp_company_sdate'])).'">
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="'.strftime('%Y-%m-%d', strtotime($row['wexp_company_edate'])).'">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="work_description" class="form-label">Work Description</label>
                                <textarea type="text" class="form-control" id="work_description" name="work_description">'.$row['wexp_work_description'].'</textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="technology_description" class="form-label">Technology Description</label>
                                <textarea type="text" class="form-control" id="technology_description" name="technology_description">'.$row['wexp_tech_description'].'</textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="offer_letter" class="form-label">Offer Letter</label>
                                <input type="file" class="form-control" id="offer_letter" name="offer_letter">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="work_letter" class="form-label">Experience/Internship Letter</label>
                                <input type="file" class="form-control" id="work_letter" name="work_letter">
                            </div>
                            <div class="mb-3 col-md-4">
                                <a href="portal/img/'.$row['wexp_company_logo'].'" target="_blank">View Logo</a>
                            </div>
                            <div class="mb-3 col-md-4">
                                <a href="portal/img/'.$row['wexp_offer_letter'].'" target="_blank">View Offer Letter</a>
                            </div>
                            <div class="mb-3 col-md-4">
                                <a href="portal/img/'.$row['wexp_exp_letter'].'" target="_blank">View Experience Letter</a>
                            </div>
                        </div>
                        <button type="submit" id="edit_workexp_btn" name="edit_workexp_btn" class="btn edit_work_info" value="edit_workexp_btn">Update Work Experience</button>
                    </form>
        ';
    }
?>
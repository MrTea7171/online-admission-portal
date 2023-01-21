<?php
include('../../includes/connection.php');
$stmt = $conn->prepare( "select sp.student_id, sp.student_fname, sp.student_caste, sp.student_email, sp.student_phone, scd.student_addmission_mode, scd.admission_status from student_personal sp inner join student_college_details scd where sp.student_id=scd.student_id" );
$stmt->execute();
$result = $stmt->get_result();
$count=$result->num_rows;
$arr = array();
if($count > 0) 
{
    $i=0;
	while($row = $result->fetch_assoc()) 
	{
		$arr[]=array('student_no'=>"".++$i,'student_id'=>$row["student_id"],'student_name'=>$row["student_fname"], 'student_email'=>$row["student_email"],'student_phone'=>$row["student_phone"],'student_caste'=>$row["student_caste"],'student_addmission_mode'=>$row["student_addmission_mode"],'student_addmission_status'=>$row["admission_status"], 'student_buttons'=>'<button id='.$row["student_id"].' class="action_btns profile_view_btn"> View </button><button id='.$row["student_id"].' class="action_btns review_btn"> Status</button>');
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>
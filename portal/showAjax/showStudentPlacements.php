<?php
include('../../includes/connection.php');
$stmt = $conn->prepare("select * from student_work_exp swe inner join student_personal sp on swe.student_id=sp.student_id where swe.wexp_type= 'placement' order by swe.wexp_id desc");
$stmt->execute();
$result = $stmt->get_result();
$count=$result->num_rows;
$arr = array();
if($count > 0) 
{
    $i=0;
	while($row = $result->fetch_assoc()) 
	{$arr[]=array('work_no'=>"".++$i,'wexp_id'=>$row["wexp_id"],'student_name'=>$row["student_fname"], 'company_logo'=>"<img src='../img/".$row["wexp_company_logo"]."' 'height=120px'>", 'company_name'=>$row["wexp_company_name"],'company_description'=>$row["wexp_company_description"],'role'=>$row["wexp_company_role"], 'start_date'=>date_format(date_create($row["wexp_company_sdate"]),"d/m/Y"), 'last_date'=>date_format(date_create($row["wexp_company_edate"]),"d/m/Y"), 'offer_buttons'=>'<button id='.$row["wexp_id"].' class="offeredit_btn edit_btn action_btns">Edit</button><button id='.$row["wexp_id"].' class="offerdelete_btn delete_btn action_btns">Delete</button>');
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>
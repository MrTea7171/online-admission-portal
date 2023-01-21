<?php
include('../../includes/connection.php');
$stmt = $conn->prepare( "select * from college_placement_offers order by cpo_id desc" );
$stmt->execute();
$result = $stmt->get_result();
$count=$result->num_rows;
$arr = array();
if($count > 0) 
{
    $i=0;
	while($row = $result->fetch_assoc()) 
	{
		$arr[]=array('offer_no'=>"".++$i,'offer_id'=>$row["cpo_id"],'company_logo'=>"<img src='../img/".$row["cpo_logo"]."' 'height=120px'>", 'company_name'=>$row["cpo_name"],'company_description'=>$row["cpo_description"],'role'=>$row["cpo_role"],'salary'=>$row["cpo_salary"],'link'=>"<a class='link_design_none' href='".$row["cpo_link"]."' target='_blank'>".$row["cpo_link"]."</a>", 'last_date'=>date_format(date_create($row["cpo_ldate"]),"d/m/Y h:i a"),'offer_buttons'=>'<button id='.$row["cpo_id"].' class="offeredit_btn edit_btn action_btns">Edit</button><button id='.$row["cpo_id"].' class="offerdelete_btn delete_btn action_btns">Delete</button>');
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>
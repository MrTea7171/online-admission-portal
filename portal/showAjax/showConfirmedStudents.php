<?php
include('../../includes/connection.php');
$stmt = $conn->prepare("select * from student_confirm order by confirm_id desc");
$stmt->execute();
$result = $stmt->get_result();
$count=$result->num_rows;
$arr = array();
if($count > 0) 
{
    $i=0;
	while($row = $result->fetch_assoc()) 
	{
		$arr[]=array(
            'confirm_no'=>"".++$i,
            'student_name'=>$row["student_name"],
            'cap_id'=>$row["cap_id"],
            'enrollment_id'=>$row["enrollment_id"],
            'email_id'=>$row["email_id"],
            'confirmed_actions'=>'<button id='.$row["confirm_id"].' class="confirmedit_btn edit_btn action_btns">Edit</button><button id='.$row["confirm_id"].' class="confirmdelete_btn delete_btn action_btns">Delete</button>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

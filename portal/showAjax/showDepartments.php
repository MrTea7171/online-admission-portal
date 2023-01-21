<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select * from student_department order by department_id desc");
$stmt1->execute();
$result = $stmt1->get_result();
$count=$result->num_rows;
$arr = array();
if($count > 0) 
{
    $i=0;
	while($row = $result->fetch_assoc()) 
	{
		$arr[]=array(
            'department_no'=>"".++$i,
            'department_id'=>$row["department_id"],
            'department_name'=>$row["department_name"],
            'department_code'=>$row["department_code"],
            'department_short'=>$row["department_short"],
            'department_actions'=>'<button id='.$row["department_id"].' class="departmentedit_btn edit_btn action_btns">Edit</button><button id='.$row["department_id"].' class="departmentdelete_btn delete_btn action_btns">Delete</button>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

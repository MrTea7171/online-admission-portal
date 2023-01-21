<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select * from classes c inner join student_department sd on c.class_branch=sd.department_id order by c.class_id desc");
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
            'class_no'=>"".++$i,'class_name'=>$row["class_name"], 'class_branch'=>$row["department_name"], 'class_batch'=>$row["class_batch"], 'class_year'=>$row["class_year"], 'class_sem'=>$row["class_sem"],
            'class_actions'=>'<button id='.$row["class_id"].' class="classedit_btn edit_btn action_btns">Edit</button><button id='.$row["class_id"].' class="classdelete_btn delete_btn action_btns">Delete</button>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

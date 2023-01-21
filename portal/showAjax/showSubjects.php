<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select * from subjects s inner join student_department sd on s.subject_branch=sd.department_id order by s.subject_id desc");
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
            'subject_no'=>"".++$i,'subject_name'=>$row["subject_name"], 'subject_branch'=>$row["department_name"],
            'subject_actions'=>'<button id='.$row["subject_id"].' class="subjectedit_btn edit_btn action_btns">Edit</button><button id='.$row["subject_id"].' class="subjectdelete_btn delete_btn action_btns">Delete</button>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

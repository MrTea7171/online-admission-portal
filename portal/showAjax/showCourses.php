<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select * from courses c inner join classes cl on c.course_class=cl.class_id inner join faculty f on c.course_faculty=f.faculty_id inner join subjects s on s.subject_id=c.course_subject order by c.course_id desc");
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
            'course_no'=>"".++$i,'course_class'=>$row["class_name"], 'course_faculty'=>$row["faculty_name"], 'course_subject'=>$row["subject_name"],
            'course_actions'=>'<button id='.$row["course_id"].' class="courseedit_btn edit_btn action_btns">Edit</button><button id='.$row["course_id"].' class="coursedelete_btn delete_btn action_btns">Delete</button>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

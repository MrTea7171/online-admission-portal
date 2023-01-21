<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select sp.student_id, sp.student_fname, sp.student_email, sp.student_phone, sd.department_name, ss.course_year, ss.sem, ss.batch_year from student_personal sp inner join student_college_details scd on sp.student_id=scd.student_id inner join student_department sd on scd.student_department=sd.department_id inner join student_status ss on sp.student_id=ss.student_id");
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
            'student_no'=>"".++$i,'student_name'=>$row["student_fname"], 'student_email'=>$row["student_email"], 'student_phone'=>$row["student_phone"], 'student_branch'=>$row["department_name"], 'student_year'=>$row["course_year"], 'student_sem'=>$row["sem"], 'student_batch'=>$row["batch_year"]
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

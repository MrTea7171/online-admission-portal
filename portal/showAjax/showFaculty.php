<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select * from faculty f inner join student_department sd on f.faculty_branch=sd.department_id order by f.faculty_id desc");
$stmt1->execute();
$result = $stmt1->get_result();
$count=$result->num_rows;
$stmt1->close();
$faculty_roles="";
$arr = array();
if($count > 0) 
{
    $i=0;
	while($row = $result->fetch_assoc()) 
	{
        $faculty_roles="";
        if($row["faculty_roles"]!=0)
        {
            $stmt2 = $conn->prepare("select * from roles where role_id in (".$row["faculty_roles"].")");
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $stmt2->close();
            while($row2 = $result2->fetch_assoc())
            {
                $faculty_roles=$row2['role_name']."<br>".$faculty_roles;
            }
        }
        else
        {
            $faculty_roles="No Roles Assigned";
        }
		$arr[]=array(
            'faculty_no'=>"".++$i,'faculty_name'=>$row["faculty_name"],'faculty_email'=>$row["faculty_email_id"],'faculty_branch'=>$row["department_name"],'faculty_phone'=>$row["faculty_phone"],
            'faculty_roles'=>$faculty_roles,
            'faculty_actions'=>'<button id='.$row["faculty_id"].' class="facultyedit_btn edit_btn action_btns">Edit</button><button id='.$row["faculty_id"].' class="facultydelete_btn delete_btn action_btns">Delete</button>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

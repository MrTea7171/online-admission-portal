<?php
include('../../includes/connection.php');
$stmt1 = $conn->prepare("select * from student_fees order by fee_no desc");
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
            'fee_no'=>"".++$i,
            'batch'=>$row["batch"], 'year'=>$row["year"], 'caste'=>$row["caste"],
            'total_fees'=>$row["total_fees"], 'fee_actions'=>'<button id='.$row["fee_no"].' class="feesedit_btn edit_btn action_btns">Edit</button><button id='.$row["fee_no"].' class="feesdelete_btn delete_btn action_btns">Delete</button><a href="Fee-Details.php?fee_id='.$row["fee_no"].'"class="action_btns">View Details</a>'
        );
	}
}
$json_response = json_encode(array("data"=>$arr));
echo $json_response;
?>

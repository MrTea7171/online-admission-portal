<?php
    require '../../includes/connection.php';
    require '../../vendor/autoload.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date( "Y-m-d H:i:s" );
    $year=date("Y");
    $affected=0;
    $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $spreadsheet= $reader->load($_FILES['confirmedStudentSheet']['name']);
    $worksheet=$spreadsheet->getActiveSheet();
    $stmt = $conn->prepare( "select substr(enrollment_id, -3) from student_confirm where year(date_added)>=? order by confirm_id desc limit 1" );
    $stmt->bind_param('s',$year);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_row();
    $stmt->close();
    if(!isset($row[0]))
    {
        $row[0]=0;
    }
    $enroll=$row[0];
    foreach($worksheet->getRowIterator() as $row)
    {
        $cellIterator=$row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        $data=[];
        foreach($cellIterator as $cell)
        {
            $data[]=$cell->getValue();
        }
        $confirm_total=str_pad($enroll++,4,"0",STR_PAD_LEFT);
        $enrollment_id="NHITM".date('y').$confirm_total;
        $stmt1 = $conn->prepare( "insert into student_confirm(student_name, cap_id, enrollment_id, email_id, date_added) values (?,?,?,?,?)" );
        $stmt1->bind_param("sssss", $data[1], $data[0], $enrollment_id, $data[2], $date);
        $stmt1->execute();
        $affected = mysqli_affected_rows( $conn );
        $stmt1->close();    
    }
    if ( $affected>0 )
    {
        echo 1;
    }
    else
    {
        echo 0;
    }
?>   
<?php
    session_start();
    if(!isset($_SESSION['user_enroll']) && !isset($_SESSION['status']))
    {
        header("Location:student-login.php");
    }
    require 'includes/connection.php';
    $enroll=$_SESSION['user_enroll'];
    $stmt = $conn->prepare( "select * from payment_status ps inner join payment_records pr on ps.pstatus_id=pr.pstatus_id inner join student_personal sp on sp.student_id= ps.student_id where sp.enrollment_no=?" );
    $stmt->bind_param("s", $enroll);
    $stmt->execute();
    $result = $stmt->get_result();
    $count=$result->num_rows;
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dark_green_bg">
      <?php require("includes/navbar.php"); ?>
    <div class="container mt-3" id="payment_record_box">
        <div class="text-center">
            <h3 id="page_title">Payment Records</h3>
        </div>
        <h4 class="section_title">Records</h4>
        <?php
            if($count > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
        ?>
        <div class="card mt-3 p-3">
            <div class="row g-0">
                <div class="col-md-2 payment_sem_title">
                    <h2><?php echo $row['year']; ?></h2>
                    <h4><?php echo $row['batch']; ?></h4>
                </div>
                <div class="col-md-8 payment_detail_box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Payment:</label>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-inline-block ml-3">
                                       <?php 
                                            $date=date_create($row['payment_date']);
                                            echo date_format($date,"j<\s\up>S</\s\up> F Y");
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Bill No:</label>
                                </div>
                                <div class="col-md-6">
                                    <span><?php echo $row['bill_no']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Mode of Payment:</label>
                                </div>
                                <div class="col-md-6">
                                    <span class="d-inline-block ml-3"><?php echo $row['payment_mode']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>DD no./ Transaction Id:</label>
                                </div>
                                <div class="col-md-6">
                                    <span><?php echo $row['unique_id']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Amount Paid:</label>
                                </div>
                                <div class="col-md-6">
                                    <span><?php echo $row['amount_paid']; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Payment Status:</label>
                                </div>
                                <div class="col-md-6">
                                    <span><?php echo $row['status']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 payment_sem_title ">
                        <h3><a href="fee_receipt.php?pstatus=<?php echo $row['pstatus_id']; ?>" class="d-block plain">View Reciept</a></h3>
                </div>
            </div>
        </div>
        <?php
                }
            }
        ?>
        <div class="card mt-3 p-3 text-center">
            <div class="row">
                <div class="col-md-12">
                    <h4 id="report_enquire_text">For any changes to your provided records please convey <a href="#" id="report_enquire_link">through here.</a></h4>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
</body>

</html>

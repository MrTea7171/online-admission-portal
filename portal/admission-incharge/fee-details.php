<?php
if(!isset($_GET['fee_id']))
{
    header("Location:fees.php");
}
function money($value)
{
    if($value==0)
    {
        return '-';
    }
    else
    {
        return 'Rs. '.$value;
    }
}
include('../../includes/connection.php');
$fee_id=$_GET['fee_id'];
$stmt = $conn->prepare("select * from student_fees where fee_no=?");
$stmt->bind_param("s", $fee_id);
$stmt->execute();
$result = $stmt->get_result();
$count=$result->num_rows;
$row=array();
if($count > 0) 
{
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fee Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../../includes/globalLib_Top.php"); ?>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/profiles.css">
    <style>
        a {
            text-decoration: none;
            color: #000;
        }

        li:hover {
            background: #1E4620;
        }

        li:hover>a {
            color: #FFF;
        }
    </style>
</head>

<body class="dark_green_bg">
    <div class="container mt-3">
        <div class="text-center">
            <h3 id="page_title">Fee Details</h3>
        </div>
        <div class="row mt-3">
            <div class="col-md-8 mx-auto text-center">
                <div class="card">
                    <div class="card-body">
                        <div id="fee_body" class="row fee-body mx-auto">
                            <div class="col-md-12">
                                <h3 class="text-center">Fee Structure</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-2">Batch</div>
                                <div class="col-md-2" id="batch"><?php echo $row['batch']; ?></div>
                                <div class="col-md-2">Year</div>
                                <div class="col-md-2" id="year"><?php echo $row['year']; ?></div>
                                <div class="col-md-2">Caste</div>
                                <div class="col-md-2" id="caste"><?php echo $row['caste']; ?></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">Tution Fees</div>
                                <div class="col-md-6"><?php echo money($row['tution_fee']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Development Fees</div>
                                <div class="col-md-6"><?php echo money($row['development_fee']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Other Fees</div>
                                <div class="col-md-6"><?php echo money($row['other_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Caution Money Deposit</div>
                                <div class="col-md-6"><?php echo money($row['caution_money']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Enrollment Fees/ Examination Fees</div>
                                <div class="col-md-6"><?php echo money($row['enrollment_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Form Fees / Additional Fees as per SSS</div>
                                <div class="col-md-6"><?php echo money($row['form_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">University Sports &amp; Cul. Act. Fees</div>
                                <div class="col-md-6"><?php echo money($row['sports_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">University Annual Contribution for Cul. Activities</div>
                                <div class="col-md-6"><?php echo money($row['cultural_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">University Disater Relief Fund</div>
                                <div class="col-md-6"><?php echo money($row['relief_fund']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">University Gymkhana Fees / University NSS Fees</div>
                                <div class="col-md-6"><?php echo money($row['gym_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">University E-Charges</div>
                                <div class="col-md-6"><?php echo money($row['e_charges']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Yuiva - Raksha Student's Insurance</div>
                                <div class="col-md-6"><?php echo money($row['yuvia_fees']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Others</div>
                                <div class="col-md-6"><?php echo money($row['others']); ?></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">Total Fees</div>
                                <div class="col-md-6"><?php echo money($row['total_fees']); ?></div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><button class="btn btn-success" id="fee_pdf">Download PDF</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        require("../../includes/globalLib_Bottom.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#fee_pdf").click(function() {
                let fileName = "Document";
                let fee_body = document.getElementById("fee_body");
                var opt = {
                    margin: 0.4,
                    html2canvas: {
                        scale: 2
                    },
                    filename: fileName + ".pdf",
                    image: {
                        type: 'png'
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'p'
                    },
                    pagebreak: {
                        mode: 'avoid-all'
                    },
                    enableLinks: false
                };
                html2pdf().set(opt).from(fee_body).save();
            });
        });

    </script>
</body>

</html>

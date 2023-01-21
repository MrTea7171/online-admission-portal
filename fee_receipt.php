<?php
    require 'includes/connection.php';
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
    function getIndianCurrency(float $number)
    {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two',
            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
            7 => 'seven', 8 => 'eight', 9 => 'nine',
            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees : '') . $paise;
    }
    $pstatus=$_GET['pstatus'];
    $stmt = $conn->prepare( "select * from student_personal sp inner join student_college_details scd on sp.student_id=scd.student_id inner join student_department sd on sd.department_id=scd.student_department inner join payment_status ps on ps.student_id=sp.student_id inner join payment_records pr on ps.pstatus_id=pr.pstatus_id where ps.pstatus_id=?" );
    $stmt->bind_param('s',$pstatus);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    $stmt = $conn->prepare("select * from student_fees where batch=? and year=? and caste=?");
    $stmt->bind_param("sss", $row['batch'],$row['year'],$row['student_caste']);
    $stmt->execute();
    $result = $stmt->get_result();
    $count=$result->num_rows;
    $stmt->close();
    $row2 = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fee Reciept</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            font-size: 14px;
        }

        #fee_card .card-title {
            border-bottom: 1px solid #000;
        }

    </style>
</head>

<body class="dark_green_bg">
    <div class="container my-5">
        <div class="card col-sm-7 mx-auto" id="fee_card">
            <div class="card-title py-4 px-4">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="img/logo.png" height="90px">
                    </div>
                    <div class="col-sm-10 text-center">
                        <h6 class="mb-3">NEW HORIZON EDUCATION SOCIETY'S</h6>
                        <h5>NEW HORIZON INSTITUE OF TECHNOLOGY AND MANAGEMENT</h5>
                        <h6 class="mt-3">Anand Nagar, Kavesar, Off Ghodbhunder Road, Thane (West)-400615 Tel:25971778</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-subtitle mb-2 text-center">Admission Fee Reciept</h5>
                <div class="row">
                    <div class="col-sm-4">
                        Bill No: <?php echo $row['bill_no']; ?>
                    </div>
                    <div class="col-sm-4 text-center">
                        Caste: <?php echo $row['student_caste']; ?>
                    </div>
                    <div class="col-sm-4 text-end">
                        Date: <?php echo date_format(date_create($row['payment_date']),"j<\s\up>S</\s\up> F Y"); ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-4">
                        IEN: <?php echo $row['student_ien']; ?>
                    </div>
                    <div class="col-sm-4 text-center">
                        Student Name: <?php echo $row['student_fname']; ?>
                    </div>
                    <div class="col-sm-4 text-end">
                        Branch: <?php echo $row['department_name']; ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-6 text-start">
                        Addmitted Year: <?php echo $row['student_admission_year']; ?>
                    </div>
                    <div class="col-sm-6 text-end">
                        Admitted Towards: <?php echo $row['year']; ?>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Particulars</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tution Fees</td>
                            <td><?php echo money($row2['tution_fee']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Development Fees</td>
                            <td><?php echo money($row2['development_fee']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Other Fees</td>
                            <td><?php echo money($row2['other_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Caution Money Deposit</td>
                            <td><?php echo money($row2['caution_money']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Enrollment Fees/ Examination Fees</td>
                            <td><?php echo money($row2['enrollment_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Form Fees / Additional Fees as per SSS</td>
                            <td><?php echo money($row2['form_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>University Sports & Cul. Act. Fees</td>
                            <td><?php echo money($row2['sports_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>University Annual Contribution for Cul. Activities</td>
                            <td><?php echo money($row2['cultural_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>University Disater Relief Fund</td>
                            <td><?php echo money($row2['relief_fund']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>University Gymkhana Fees / University NSS Fees</td>
                            <td><?php echo money($row2['gym_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">11</th>
                            <td>University E-Charges</td>
                            <td><?php echo money($row2['e_charges']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">12</th>
                            <td>Yuiva - Raksha Student's Insurance</td>
                            <td><?php echo money($row2['yuvia_fees']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">13</th>
                            <td>Others</td>
                            <td><?php echo money($row2['others']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <td>Total Fees</td>
                            <td><?php echo money($row2['total_fees']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p>Thank You,</p>
                <p class="text-capitalize">Received the sum of Rs.(in words): <?php echo getIndianCurrency($row2['total_fees']);?></p>
                <div class="row">
                    <div class="col-md-6">Mode of Payment: <?php echo $row['payment_mode']; ?></div>
                    <div class="col-md-6">Dated: <?php echo date_format(date_create($row['payment_date']),"j<\s\up>S</\s\up> F Y");?></div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">Payment: <?php echo $row['payment_bank']; ?></div>
                    <div class="col-md-6">Transaction ID/ DD No: <?php echo $row['unique_id']; ?></div>
                </div>

                <p class="mt-2">
                    <small><b>This is a digitally generated reciept.</b></small><br>
                    <small><b>Reciept is valid subject to realisation of offline/online payment.</b></small>
                </p>
            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn button_ui p-2" id="receipt_download">Download Receipt</button>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $("#receipt_download").click(function() {
                let studentName = "Fee_Reciept";
                let profile_sec = document.getElementById("fee_card");
                var opt = {
                    margin: 0.4,
                    html2canvas: {
                        scale: 2
                    },
                    filename: studentName + ".pdf",
                    image: {
                        type: 'png'
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a3',
                        orientation: 'l'
                    },
                    pagebreak: {
                        mode: 'avoid-all'
                    },
                    enableLinks: false
                };
                html2pdf().set(opt).from(profile_sec).save();
            });
        });

    </script>
</body>

</html>

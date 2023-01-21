<?php
    session_start();
    require 'includes/connection.php';
    date_default_timezone_set( 'Asia/Kolkata' );
    $date = date("Y", strtotime("-6 months"));
    function batch($course_year,$date)
    {
        if($course_year=="FE")
        {
            return $date+4;
        }
        else if($course_year=="SE")
        {
            return $date+3;
        }
        else if($course_year=="TE")
        {
            return $date+2;
        }
        else if($course_year=="BE")
        {
            return $date+1;
        }
    }

    $enroll=$_SESSION['user_enroll'];
    $stmt = $conn->prepare( "select * from student_personal sp inner join student_college_details scd on sp.student_id=scd.student_id inner join student_status ss on sp.student_id=ss.student_id inner join student_department sd on sd.department_id=scd.student_department where sp.enrollment_no=?" );
    $stmt->bind_param('s',$enroll);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Virtual ID</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php 
        require("includes/globalLib_Top.php");
    ?>
    <link rel="stylesheet" href="css/style.css">
    <style> 
        #student_details_id .list-group-item
        {
            background: transparent;
            color: #1e4620;
            border: none;
            font-size: 18px;
        }
        
        #student_virtual_id
        {
            margin: 0px auto;
            box-shadow: 0px 0px 5px #FFF;
        }
        
        #virtual_id_photo
        {
            overflow: hidden;
            border: 3px solid #1e4620;
        }
    </style>
</head>


<body class="dark_green_bg">
    <div class="container my-5">
        <div class="card col-sm-8" id="student_virtual_id">
            <div class="card-header dark_green_bg white_color">
                <div class="row mt-2">
                    <div class="col-sm-2">
                        <img src="img/logo.png" height="120px">
                    </div>
                    <div class="col-sm-7 text-justify">
                        <h6>NEW HORIZON EDUCATION SOCIETY'S</h6>
                        <h3 class="mt-2">NEW HORIZON</h3>
                        <h5>INSTITUE OF TECHNOLOGY AND MANAGEMENT</h5>
                        <h6 class="mt-3">KAVESAR'S, ANAND NAGAR, GHODBHUNDER ROAD, THANE </h6>
                    </div>
                    <div class="col-sm-3 text-center">
                        <svg id="barcode"></svg>
                        <h2 class="mt-2">NHITM</h2>
                    </div>
                </div>
            </div>
            <div class="card-body dark_green_color" id="student_details_id">
                <div class="row">
                    <div class="col-sm-4">
                           <img src="student_data/<?php echo $row['student_passport_pic']; ?>" alt="" id="virtual_id_photo" height="400px">
                    </div>
                    <div class="col-sm-8 text-end">
                        <h1><?php echo $row['student_fname']; ?></h1>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $row['department_name']; ?></li>
                            <li class="list-group-item">IEN: <?php echo $row['student_ien']; ?></li>
                            <li class="list-group-item">Class: <?php echo $row['student_admission_year']."-".batch($row['course_year'],$date); ?></li>
                            <li class="list-group-item"><?php echo $row['student_email']; ?></li>
                            <li class="list-group-item">Admission Year: <?php echo $row['student_admission_year']; ?> <?php echo $row['student_admission_to']; ?></li>
                            <li class="list-group-item">Blood Group: <?php echo $row['student_blood']; ?></li>
                            <li class="list-group-item">
                                <div class="mx-3">
                                    <img src="img/principal.png" alt="" height="50px"><br>Principal
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center dark_green_bg white_color">
                <h6>WWW.NHITM.AC.IN</h6>
                <p>In case of emergency, please contact: 8210971980 </p>
            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn button_ui p-2" id="Id_download">Download Virtual Id</button>
        </div>
    </div>
    <?php 
        require("includes/globalLib_Bottom.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" integrity="sha512-YcsIPGdhPK4P/uRW6/sruonlYj+Q7UHWeKfTAkBW+g83NKM+jMJFJ4iAPfSnVp7BKD4dKMHmVSvICUbE/V1sSw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        JsBarcode("#barcode", "11812005", {
            height: 50
        });

    </script>
    <script>
        $(document).ready(function() {
            $("#Id_download").click(function(){
                let studentName = "Virtual Id";
                let profile_sec = document.getElementById("student_virtual_id");
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
                    enableLinks:false
                };
                html2pdf().set(opt).from(profile_sec).save();
            });
        });

    </script>
</body>


</html>

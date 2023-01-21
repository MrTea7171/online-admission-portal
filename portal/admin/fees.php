<?php
    session_start();
    if(!isset($_SESSION['user_mode']) && !isset($_SESSION['user_id']))
    {
        header("Location:admin-login.php");
    }
    require '../../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Fees</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
    <?php require("../includes/admin_navbar.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Fees</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addFeeDeatils_Form">
            <h3 class="text-center mb-3">Add Fees Details</h3>
            <div class="mb-3 text-center addition_form_elements">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="batch">Batch</label>
                            <input type="text" class="form-control" id="batch" name="batch">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="year">Year</label>
                            <select class="form-control" id="year" name="year">
                                <option value="" selected disabled hidden>----Select Year----</option>
                                <option value="FE">FE</option>
                                <option value="DSE">DSE</option>
                                <option value="SE">SE</option>
                                <option value="TE">TE</option>
                                <option value="BE">BE</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="caste">Caste</label>
                            <select class="form-control" id="caste" name="caste">
                                <option value="" selected disabled hidden>----Select Caste----</option>
                                <option value="Open">Open</option>
                                <option value="OBC">OBC</option>
                                <option value="ST/SC/NTB/Others">ST/SC/NTB/Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="tution_fees">Tution Fees</label>
                            <input type="text" class="form-control fee_input" id="tution_fees" name="tution_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="development_fees">Development Fees</label>
                            <input type="text" class="form-control fee_input" id="development_fees" name="development_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="other_fees">Other Fees</label>
                            <input type="text" class="form-control fee_input" id="other_fees" name="other_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="caution_money">Caution Money</label>
                            <input type="text" class="form-control fee_input" id="caution_money" name="caution_money">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="enrollment_fees">Enrollment Fees</label>
                            <input type="text" class="form-control fee_input" id="enrollment_fees" name="enrollment_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="form_fees">Form Fees</label>
                            <input type="text" class="form-control fee_input" id="form_fees" name="form_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="sports_fees">Sports Fees</label>
                            <input type="text" class="form-control fee_input" id="sports_fees" name="sports_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="cultural_fees">Cultural Fees</label>
                            <input type="text" class="form-control fee_input" id="cultural_fees" name="cultural_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="relief_fund">Relief Fund</label>
                            <input type="text" class="form-control fee_input" id="relief_fund" name="relief_fund">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="gymkhana_fees">Gymkhana Fees</label>
                            <input type="text" class="form-control fee_input" id="gymkhana_fees" name="gymkhana_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="e_charges">E Charges</label>
                            <input type="text" class="form-control fee_input" id="e_charges" name="e_charges">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="yuvia_fees">Yuvia Fees</label>
                            <input type="text" class="form-control fee_input" id="yuvia_fees" name="yuvia_fees">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="others">Others</label>
                            <input type="text" class="form-control fee_input" id="others" name="others">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3 text-center">
                            <label for="total_fees">Total Fees</label>
                            <input type="text" class="form-control" id="total_fees" name="total_fees" readonly>
                        </div>
                    </div>
                </div>
                <button type="submit" name="addFeeDetailsBtn" class="btn btn-primary mt-3 d-block" id="addFeeDetailsBtn" value="addFeeDetailsBtn">Add Fee Details</button>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Fee Details</h3>
            <table id="feesdetail_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Batch</th>
                        <th scope="col">Year</th>
                        <th scope="col">Caste</th>
                        <th scope="col">Total Fees</th>
                        <th scope="col" class='notexport'>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="modal EditModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Fee Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamic-modal-content">
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
    <script>
        $(document).ready(function() {
            $(".fee_input").each(function() {
                $(this).val(0);
            });
            $(".fee_input").keyup(function() {
                let num = $(this).val();
                if (!isNaN(num) && num!="") {
                    let sum = 0,
                        num2 = 0;
                    $(".fee_input").each(function() {
                        num2 = $(this).val();
                        sum = parseInt(num2) + sum;
                    });
                    $("#total_fees").val(sum);
                }
                else{
                    $(this).val(0);
                }
            });
            $(document).on("keyup",".edit_fee_input",function() {
                let num = $(this).val();
                if (!isNaN(num) && num!="") {
                    let sum = 0,
                        num2 = 0;
                    $(".edit_fee_input").each(function() {
                        num2 = $(this).val();
                        sum = parseInt(num2) + sum;
                    });
                    $("#edit_total_fees").val(sum);
                }
                else{
                    $(this).val(0);
                }
            });
        });

    </script>
</body>

</html>

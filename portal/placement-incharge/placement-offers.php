<?php
    session_start();
    if(!isset($_SESSION['user_mode']) && !isset($_SESSION['user_id']) && !in_array(2,$_SESSION['user_roles']))
    {
        header("Location:../faculty-login.php");
    }
    require '../../includes/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Placement Offers</title>
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
</head>

<body>
   <?php require("../includes/placement_nav.php"); ?>
    <div class="container">
        <h2 class="my-3 text-center">Placement Offers</h2>
        <form class="mt-3 col-12 top_add_bg addtion_form" id="addCpoOffersform" enctype="multipart/form-data">
            <h3 class="text-center mb-3">Add New Placement Offer</h3>
            <div class="mb-3 addition_form_elements">
                <div class="row">
                   <div class="col-md-6">
                        <label for="cpo_logo">Company Logo</label>
                        <input type="file" class="form-control" id="cpo_logo" name="cpo_logo" accept="image/*">
                    </div>
                    <div class="col-md-6">
                        <label for="cpo_name">Company Name</label>
                        <input type="text" class="form-control" id="cpo_name" name="cpo_name">
                    </div>
                    <div class="col-md-12">
                        <label for="cpo_description">Company Description</label>
                        <textarea class = "form-control" name="cpo_description" id="cpo_description"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="cpo_role">Role</label>
                        <input type="text" class="form-control" id="cpo_role" name="cpo_role">
                    </div>
                    <div class="col-md-6">
                        <label for="cpo_salary">Salary</label>
                        <input type="text" class="form-control" id="cpo_salary" name="cpo_salary">
                    </div>
                    <div class="col-md-6">
                        <label for="cpo_link">Link to Apply</label>
                        <input type="text" class="form-control" id="cpo_link" name="cpo_link">
                    </div>
                    <div class="col-md-6">
                        <label for="cpo_ldate">Last Date</label>
                        <input type="datetime-local" class="form-control" id="cpo_ldate" name="cpo_ldate">
                    </div>
                </div>
                <button type="submit" name="addCpoOffers_btn" class="btn btn-primary mt-3 d-block" id="addCpoOffers_btn" value="addCpoOffers_btn">Add Offers</button>
            </div>
        </form>
    </div>
    <div class="container-fluid">
        <div class="manage-box manage_bg">
            <h3 class="text-center">Manage Offers</h3>
            <table id="placement_offers_table" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Sr.No</th>
                        <th scope="col">Company Logo</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Company Description</th>
                        <th scope="col">Role</th>
                        <th scope="col">Salary</th>
                        <th scope="col">Link to Apply</th>
                        <th scope="col">Last Date</th>
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
                    <h5 class="modal-title">Edit Placement Offer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamic-modal-content">
                </div>
            </div>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>

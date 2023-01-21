<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require("../includes/globalLib.php");?>
    <?php require("../includes/TableLib.php");?>
    <link rel="stylesheet" href="../../css/style.css">
</head>

<body class="dark_green_bg">
    <div class="container center_box">
        <div class="col-md-4 box_model">
            <form id="admin_login">
               <h3 class="text-center">Admin Login</h3>
                <div class="mb-3">
                    <label for="email_id" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="email_id" name="email_id">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" name="login_admin_btn" id="login_admin_btn" class="btn btn-success w-100" value="login_admin_btn">Login</button>
            </form>
        </div>
    </div>
    <?php require("../includes/globalJS.php");?>
</body>

</html>

<?php
    session_start();
    if(isset($_SESSION['admin_id'])){
        $admin_id = $_SESSION['admin_id'];
    }else{
        echo "<script>window.location.href='login.php'</script>";
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Knowledge Sharing System (FK-EduSearch)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="row">
        <div class="col-2 side-bar" style="height:100vh;">
            <div style="text-align:center;"><img src="assets/img/logo.png" width="80%" alt="" srcset=""></div>
            <hr>
            <a href="index.php" class="nav_btn"><p class="active">
                <i class="fa fa-dashboard"></i> &nbsp; Dashboard
            </p></a>
            <hr>
            <a href="users.php" class="nav_btn"><p>
                <i class="fa fa-users"></i> &nbsp; Users
            </p></a>
            <hr>
            <a href="logout.php" class="nav_btn"><p>
                <i class="fa fa-sign-out"></i> &nbsp; Logout
            </p></a>
        </div>
        <div class="col-10 dashboard_body">
            <img src="assets/img/background.jpg" alt="" width="100%">
        </div>
    </div>
    <script src="https://kit.fontawesome.com/813e47687a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
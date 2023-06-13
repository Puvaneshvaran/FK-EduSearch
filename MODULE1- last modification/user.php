<?php
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }else{
        echo "<script>window.location.href='login.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/813e47687a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style2.css">

</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" width="80%" alt="" srcset="">
        </a>
        <div class="navbar-items">
            <a class="nav-link active" href="user.php">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
            <a class="nav-link" href="scheduling.php">
                <i class="fa fa-users"></i> scheduling
            </a>
            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
    </nav>           
                 
                <script src="https://kit.fontawesome.com/813e47687a.js" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
              </body>
        </div>
        <div class="dashboard_body">
            <img src="assets/img/background.jpg" alt="" width="100%">
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



    </body>
    
</html>

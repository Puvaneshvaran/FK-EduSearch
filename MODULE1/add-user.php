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
            <a href="index.php" class="nav_btn"><p>
                <i class="fa fa-dashboard"></i> &nbsp; Dashboard
            </p></a>
            <hr>
            <a href="users.php" class="nav_btn"><p class="active">
                <i class="fa fa-users"></i> &nbsp; Users
            </p></a>
            <hr>
            <a href="logout.php" class="nav_btn"><p>
                <i class="fa fa-sign-out"></i> &nbsp; Logout
            </p></a>
        </div>
        <div class="col-10">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Add User</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table_box">
                        <form action="" method="post">
                            <?php error_reporting(0); if($_GET['status'] == "true"){?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Congratulations!</strong> User has been added successfully.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                            <?php }else{}?>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="uname">Username</label>
                                    <input type="text" name="uname" id="uname" required class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" required class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="pass">Password</label>
                                    <input type="password" name="pass" id="pass" required class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" required class="form-control">
                                        <option value="">--Select--</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Staff">Staff</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <br>
                                    <input type="submit" name="submit" value="Submit" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/813e47687a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
    include('assets/config/dbcon.php');
    if(isset($_POST['submit'])){
        $uname = check_input($_POST['uname']);
        $email = check_input($_POST['email']);
        $pass = password_hash(check_input($_POST['pass']),  PASSWORD_DEFAULT);
        $role = check_input($_POST['role']);
        $date = date('m-d-Y');

        $sql = "INSERT INTO `user`(`username`, `email`, `password`, `role`, `date`) VALUES ('$uname', '$email', '$pass', '$role', '$date')";
        $run = mysqli_query($conn, $sql);

        if($run = true){
            header('Location: add-user.php?status=true');
        }else{
            header('Location: add-user.php?status=error');
        }
    }
?>
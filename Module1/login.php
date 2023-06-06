<?php
    session_start();
    if(isset($_SESSION['admin_id'])){
        echo "<script>window.location.href='index.php'</script>";
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
  <body class="login_page" style="background-image:url('https://www.pngmart.com/files/13/Pattern-Transparent-Background.png'); ">
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="login_form">
                    <h2>Log Into Your Account</h2>
                    <form action="" method="post">
                        <div class="mt-3">
                            <label for="Email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mt-3">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" id="pass" class="form-control" required>
                        </div>
                        <div class="mt-3 form_btn">
                            <input type="submit" value="Login" name="submit" class="btn btn-warning">
                        </div>
                    </form>
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
        $email = check_input($_POST['email']);
        $pass = check_input($_POST['pass']);
        $qry = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $db_pass = $row['password'];
                if(password_verify($pass, $db_pass)){
                    $u_id = $row['id'];
                    $u_role = $row['role'];
                    if($u_role == "Admin"){
                        $_SESSION['admin_id'] = $u_id;
                        echo "<script>window.location.href='index.php'</script>";
                    }else if($u_role == "Staff"){
                        $_SESSION['staff_id'] = $u_id;
                        echo "<script>window.location.href='staf.php'</script>";
                    }else if($u_role == "User"){
                        $_SESSION['user_id'] = $u_id;
                        echo "<script>window.location.href='user.php'</script>";
                    }else{
                        echo "<script>window.location.href='login.php?status=error'</script>";
                    }
                }
            }
            
        }else{
            echo "<script>window.location.href='login.php?status=error'</script>";
        }
    }
?>
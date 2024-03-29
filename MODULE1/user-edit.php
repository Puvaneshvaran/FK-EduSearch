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
    <link rel="stylesheet" href="assets/css/style2.css">
  </head>
  <body>
    <?php
        include('assets/config/dbcon.php');
        $myid = $_GET['id']; 
        $qry = "SELECT * FROM `user` WHERE `id`='$myid'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
               $username = $row['username']; 
               $email = $row['email']; 
               $password = $row['password'];       
               $role = $row['role']; 
            }
        }
    ?>
      <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" width="80%" alt="" srcset="">
        </a>
        <div class="navbar-items">
            <a class="nav-link" href="index.php">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
            <a class="nav-link active" href="users.php">
                <i class="fa fa-users"></i> Users
            </a>
            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
    </nav>           
             
        <div class="col-10">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Edit User</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table_box">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="uname">Username</label>
                                    <input type="text" name="uname" value="<?php echo $username;?>" id="uname" required class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" value="<?php echo $email;?>" required class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mt-3">
                                    <label for="pass">Password</label>
                                    <input type="password" name="pass" id="pass"  class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="role">Role</label>
                                    <select name="role" id="role" required class="form-control">
                                        <option value="<?php echo $role;?>"><?php echo $role;?></option>
                                        <option value="4">Admin</option>
                                        <option value="1">Staff</option>
                                        <option value="2">Expert</option>
                                        <option value="3">Studnet</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <br>
                                    <input type="submit" name="submit" value="Update" class="btn btn-warning">
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
  
    if(isset($_POST['submit'])){
        $uname = check_input($_POST['uname']);
        $email = check_input($_POST['email']);
        $pass = check_input($_POST['pass']);
        if(empty($pass)){
            $pass = $password;
        }else{
            $pass = password_hash(check_input($_POST['pass']),  PASSWORD_DEFAULT);
        }
        $role = check_input($_POST['role']);
        $myid = $_GET['id']; 

        $sql = "UPDATE `user` SET `username`='$uname',`email`='$email',`password`='$pass',`role`='$role' WHERE `id`='$myid'";
        $run = mysqli_query($conn, $sql);

        if($run = true){
            header('Location: users.php?status=true');
        }else{
            header('Location: users.php?status=error');
        }
    }
?>
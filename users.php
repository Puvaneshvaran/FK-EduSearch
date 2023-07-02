<?php
    session_start();
    if(isset($_SESSION['admin_id'])){
        $admin_id = $_SESSION['admin_id'];
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
                 
                <script src="https://kit.fontawesome.com/813e47687a.js" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
              </body>
        </div>
       
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


  

        <div class="col-10">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Users Data</h2>
                    </div>
                    <div class="col-md-6">
                        <p style="text-align:right; margin-top:5px;"><a href="add-user.php" class="btn btn-warning"><i class="fa fa-user-plus"></i>&nbsp; <b>Add User</b></a></p>
                    </div>
                </div>
                <?php error_reporting(0); if($_GET['status'] == "true"){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Congratulations!</strong> User data has been edited successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <?php }else if($_GET['status'] == "delete"){?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> User has been deleted successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <?php }else{}?>
                <div class="row">
    <div class="col-md-12 table_box">
        <label for="sort">Sort by:</label>
        <select id="sort" class="form-control">
            <option value="id">#</option>
            <option value="username">Username</option>
            <option value="email">Email</option>
            <option value="role">Role</option>
            <option value="date">Date</option>
        </select>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sn = 1;
                    include('assets/config/dbcon.php');

                    $sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'id';
                    $sortQuery = "SELECT * FROM `user` ORDER BY ";

                    if ($sortOption === 'date') {
                        $sortQuery .= "`date` ASC";
                    } elseif ($sortOption === 'username') {
                        $sortQuery .= "`username` ASC";
                    } elseif ($sortOption === 'email') {
                        $sortQuery .= "`email` ASC";
                    } elseif ($sortOption === 'role') {
                        $sortQuery .= "`role` ASC";
                    } else {
                        $sortQuery .= "`id`";
                    }

                    $result = $conn->query($sortQuery);
                

                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                            echo '
                                                <tr>
                                                    <th>'.$sn.'</th>
                                                    <td>'.$row['username'].'</td>
                                                    <td>'.$row['email'].'</td>
                                                    <td>'.$row['role'].'</td>
                                                    <td>'.$row['date'].'</td>
                                                    <td>
                                                        <a href="user-edit.php?id='.$row['id'].'" class="btn btn-primary"><i class="fa fa-edit"></i></a>&nbsp;
                                                        <a href="user-delete.php?id='.$row['id'].'" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this user?\')"><i class="fa fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                            ';
                                            $sn++;        
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
<p>*Note: Staff   = 1
          Expert  = 2
          Student = 3
          Admin   = 4
</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById("sort").addEventListener("change", function() {
        var sortOption = this.value;
        var currentUrl = window.location.href;
        var url;

        if (currentUrl.indexOf('?') !== -1) {
            url = currentUrl.split('?')[0];
        } else {
            url = currentUrl;
        }

        window.location.href = url + '?sort=' + sortOption;
    });

    window.addEventListener("DOMContentLoaded", function() {
        var sortOption = "<?php echo $sortOption; ?>";
        var selectElement = document.getElementById("sort");

        for (var i = 0; i < selectElement.options.length; i++) {
            if (selectElement.options[i].value === sortOption) {
                selectElement.selectedIndex = i;
                break;
            }
        }
    });
</script>

    <script src="https://kit.fontawesome.com/813e47687a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
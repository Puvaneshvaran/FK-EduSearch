<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

if(isset($_GET["expert_id"])) {

    $id= $_GET["expert_id"];
}
?>

<?php
    $strSQL = "UPDATE user SET status = 'Inactive' WHERE last_login < DATE_SUB(NOW(), INTERVAL 30 DAY)";
    $rs = mysqli_query($link, $strSQL);
   

    $strSQL= "UPDATE user SET status = 'Deactivated' WHERE last_login < DATE_SUB(NOW(), INTERVAL 31 DAY) AND status = 'Inactive'";
    $rs = mysqli_query($link, $strSQL);

    

    $strSQL = "UPDATE user SET last_login = NOW() WHERE  id= '$id'";
    $rs = mysqli_query($link, $strSQL);

    $strSQL = "DELETE FROM user WHERE id=$id AND status = 'Deactivate'";
    $rs = mysqli_query($link, $strSQL);


    ?>
<?php
    session_start();
    if(isset($_SESSION['expert_id'])){
        $user_id = $_SESSION['expert_id'];
    }else{
        echo "<script>window.location.href='login.php'</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/813e47687a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        
               
    <nav class="navbar navbar-expand-lg" style="background-color: #33B998;">
  <div class="container-fluid">
     <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="80%" alt="" srcset="">
        </a>
    <a class="navbar-brand" href="#">Fk-EduSearch</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">My Home</a>
        <a class="nav-link" href="myprofile2.php?expert_id=<?php echo $id?>">My profile</a>
        <a class="nav-link" href="Calculation.php?expert_id=<?php echo $id?>">Calculation</a>
        <a class="nav-link" href="createexpert.php?expert_id=<?php echo $id?>">Make a report</a>
        <a class="nav-link"href=../login.php>Logout</a>
      </div>
    </div>
  </div>
</nav>
<h1> Welcome to Posting Site</h1>

<p>Post Assigned</p>
<?php

$strSQL = "SELECT username FROM user WHERE id = $id";

$rs = mysqli_query($link, $strSQL);

$expertname=mysqli_fetch_array($rs);

?>

<p>Expert Name : <?php echo $expertname['username'];?></p>

<?php

$strSQL = "SELECT * FROM post WHERE Expert_id = $id";

$rs = mysqli_query($link, $strSQL);

$row=mysqli_fetch_array($rs)

?>

<p>Post Category : <?php echo $row['Postgrp'];?></p>
<p>From : 'nanti keluar nama General user'</p>
<table>
    <tr>
        <TH>Post Question</TH>
    </tr>
    <tr>
        <td><?php echo $row['Post_desc'];?></td>
    </tr>
</table>
<br>
<?php
if(count($_POST)>0) {
    mysqli_query($link,"UPDATE post set Post_answer='" . $_POST['Post_Answer']."' WHERE Expert_id='". $_POST['expertid']."'");
    $message = "<p>succesfully</p>";


}

?>

<form method="post">
<?php if(isset($message)){echo $message;} ?>

<textarea name="Post_Answer" cols="30" rows="10">isi jawapan</textarea>

<input type="hidden" name="expertid" value="<?php echo $id; ?>">


<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
<a class="btn btn-primary" href="/compiled_MODULE-1/Module2/php/dashboard.php">Dashboard</a>


</form>

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
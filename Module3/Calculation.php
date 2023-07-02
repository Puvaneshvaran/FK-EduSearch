<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

if(isset($_GET["expert_id"])) {

    $id= $_GET["expert_id"];
}
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
        <a class="nav-link" aria-current="page" href="Post.php?expert_id=<?php echo $id?>">My Home</a>
        <a class="nav-link" href="myprofile2.php?expert_id=<?php echo $id?>">My profile</a>
        <a class="nav-link active" href="#">Calculation</a>
        <a class="nav-link" href="createexpert.php?expert_id=<?php echo $id?>">Make a report</a>
        <a class="nav-link" href=../login.php>Logout</a>
      </div>
    </div>
  </div>
</nav>
    
</body>
</html>
<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

if(isset($_GET["expert_id"])) {

    $id= $_GET["expert_id"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/813e47687a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
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
        <a class="nav-link active" href="myprofile2.php?expert_id=<?php echo $id?>">My profile</a>
        <a class="nav-link" href="Calculation.php?expert_id=<?php echo $id?>">Calculation</a>
        <a class="nav-link" href="createexpert.php?expert_id=<?php echo $id?>">Make a report</a>
        <a class="nav-link"href=../login.php>Logout</a>
      </div>
    </div>
  </div>
</nav>
    <h1>MY PROFILE</h1>
    <table class = "table_center">
        <tr>
            <th>Username</th>
            
        </tr>
        <tr>
            <td>
            <?php
                $strSQL = "SELECT * FROM user WHERE id = $id";

                $rs = mysqli_query($link, $strSQL);

                while ($row=mysqli_fetch_array($rs)){

                    echo $row['username']. "<br/>";}
            ?>
            </td>
        </tr>
        <TR>
            <th>Email</th>
        </TR>
        <tr>
            <td>
            <?php
                 $strSQL = "SELECT * FROM user WHERE id = $id";

                $rs = mysqli_query($link, $strSQL);

                while ($row=mysqli_fetch_array($rs)){

                echo $row['email']. "<br/>";}
             ?>
             </td>
        </tr>
        <tr>
            <th>My ID</th>
        </tr>
        <tr>
            <td>
        <?php
                 $strSQL = "SELECT * FROM user WHERE id = $id";

                $rs = mysqli_query($link, $strSQL);

                while ($row=mysqli_fetch_array($rs)){

                echo $row['id']. "<br/>";}
             ?>
             </td>
        </tr>
    </table>

<br>
<h1>Research</h1>

<table class="table_center">
    <tr>
        <th>No</th>
        <th>Title</th>
        <th>Role</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    
    <?php
                 $strSQL = "SELECT * FROM research WHERE Expertid = $id";

                $rs = mysqli_query($link, $strSQL);
                $x=0;

                while ($row=mysqli_fetch_array($rs)){
                    $x++;

                echo "<tr>
                        <td>$x</td>
                        <td>$row[Title]</td>
                        <td>$row[Role]</td>
                        <td>$row[Start_Date]</td>
                        <td>$row[End_Date]</td>
                        <td>$row[Status]</td>
                        <td>
                        <a href='delete-process-research.php?Research_id=$row[Research_id]&Expertid=$row[Expertid]' onclick=\"return confirm('Are you sure you want to proceed?')\">Delete</a>
                        <a href = 'edit-process-research.php?Research_id=$row[Research_id]'>Edit</a>
                        <tr>";}
             ?>
</table>
<div class="btn center">
<form action="addResearch.php?expert_id=<?php echo $id ?>" method="POST">
  <input type="submit" value="Add More for Research" class="btn btn-danger">
</form>
</div>
<br>

<h1>Publication</h1>
<table class="table_center">
    <tr>
        <th>No</th>
        <th>Publication Name</th>
        <th>Publication Date</th>
        <th>Publication Link</th>
        <th>Action</th>
    </tr>
        
    <?php
        $strSQL = "SELECT * FROM publication WHERE Expertid = $id";
        $rs = mysqli_query($link, $strSQL);
            $x=0;
        while ($row=mysqli_fetch_array($rs)){
            $x++;

        echo "<tr>
                <td>$x</td>
                <td>$row[Publication_name]</td>
                <td>$row[Publication_date]</td>
                <td><a href='$row[Publication_link]' target='_blank'>Click here</a></td>
                <td>
                    <a href = 'delete-process-publication.php?Publication_id=$row[Publication_id]&Expertid=$row[Expertid]' onclick=\"return confirm('Are you sure you want to proceed?')\">Delete</a>
                    <a href = 'edit-process-publication.php?Publication_id=$row[Publication_id]'>Edit</a>
                <tr>";}
            ?>
            
</table>
<div class="btn center">
<form action="addPublication.php?expert_id=<?php echo $id ?>" method="POST">
  <input type="submit" value="Add More for Publication" class="btn btn-success">
        </form>
    </div>
    <br>
  <h1>Academic Qualification </h1>
  <table class="table_center">
    <tr>
        <th>No</th>
        <th>Academic Name</th>
        <th>Action</th>
    </tr>

    <?php
        $strSQL = "SELECT * FROM academic WHERE Expertid = $id";
        $rs = mysqli_query($link, $strSQL);
            $x=0;
        while ($row=mysqli_fetch_array($rs)){
            $x++;

        echo "<tr>
                <td>$x</td>
                <td>$row[Academic_name]</td>
                <td>
                    <a href = 'delete-process-academic.php?Academic_id=$row[Academic_id]&Expertid=$row[Expertid]' onclick=\"return confirm('Are you sure you want to proceed?')\">Delete</a>
                    <a href = 'edit-process-academic.php?Academic_id=$row[Academic_id]'>Edit</a>
                <tr>";}
            ?>

    </table>
<div class="btn center">
<form action="addAcademic.php?expert_id=<?php echo $id ?>" method="POST">
  <input type="submit" value="Add More for Academic" class="btn btn-warning">
        </form>
        </div>
        <br>
        <h1>Curriculum Vitae</h1>
        <?php
        if(isset($_POST["submit1"]))
        {
            $image = addslashes(file_get_contents($_FILES['f1']['tmp_name']));
            $query = "insert into CV values('','$image','$id')" or die(mysqli_connect_error());

        }


        ?>

        
<form class="" action="" method="post" enctype="multipart/form-data">
      <label for="name">Select File : </label>
      <input type="text" name="name" id = "name" required value=""> <br>
      <label for="image">Image : </label>
      <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <button type = "submit" name = "submit">Submit</button>
    </form>


</body>
</html>
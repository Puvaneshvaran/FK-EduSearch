<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

if(count($_POST)>0) {
    mysqli_query($link,"UPDATE research set Title='" . $_POST['title']."',Role='" . $_POST['role']."', Start_Date='". $_POST['S_date'] . " ', 
    End_Date='" . $_POST['E_date'] ."', Agency= '".$_POST['agency']."', Status='".$_POST['status']."' WHERE Research_id='". $_POST['Research_id']."'");
    $message = "<p>succesfully</p>";


}

$rs = mysqli_query($link, "SELECT * FROM research WHERE  Research_id = '". $_GET['Research_id']. "'");
$row=mysqli_fetch_array($rs);
?>
<html>
    <head>
        <title>UPDATE</title>
    </head>

    <body>
    <form method="post">
    <?php if(isset($message)){echo $message;} ?>
    <input type="hidden" name="Research_id" value="<?php echo $row['Research_id']; ?>">
    <label >Title</label>
    <input type="text" name="title" value="<?php echo $row['Title']; ?>">
    <br>
    <br>
    <label >Role</label>
    <input type="text" name="role" value="<?php echo $row['Role']; ?>">
    <br>
    <br>
    <label >Start Date</label>
    <input type="date" name="S_date" value="<?php echo $row['Start_Date']; ?>">
    <br>
    <br>
    <label >End Date</label>
    <input type="date" name="E_date" value="<?php echo $row['End_Date']; ?>">
    <br>
    <br>
    <label >Agency</label>
    <input type="text" name="agency" value="<?php echo $row['Agency']; ?>">
    <br>
    <br>
    <label >Status</label>
    <input type="text" name="status" value="<?php echo $row['Status']; ?>">

    
    <br>
    <br>
 
   

    <button type="submit" name="submit" value="Submit">Submit</button>
    
    </form>
    <?php
    echo"
     <a href='myprofile2.php?expert_id=$row[Expertid]'>Back to home</a>
     ";
     ?>
    
    </body>
</html>


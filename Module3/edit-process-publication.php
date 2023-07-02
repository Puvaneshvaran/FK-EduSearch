<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

if(count($_POST)>0) {
    mysqli_query($link,"UPDATE publication set Publication_date='" . $_POST['P_date']."',Publication_name='" . $_POST['P_name']."', Publication_link='". $_POST['P_link'] . " ' WHERE Publication_id='". $_POST['Publication_id']."'");
    $message = "<p>succesfully updated</p>";


}

$rs = mysqli_query($link, "SELECT * FROM publication WHERE  Publication_id = '". $_GET['Publication_id']. "'");
$row=mysqli_fetch_array($rs);
?>
<html>
    <head>
        <title>UPDATE Publication</title>
    </head>

    <body>
    <form method="post">
    <?php if(isset($message)){echo $message;} ?>
    <input type="hidden" name="Publication_id" value="<?php echo $row['Publication_id']; ?>">
    <label >Publication Name</label>
    <input type="text" name="P_name" value="<?php echo $row['Publication_name']; ?>">
    <br>
    <br>
    <label >Publication Date</label>
    <input type="date" name="P_date" value="<?php echo $row['Publication_date']; ?>">
    <br>
    <br>
    <label >Publication Link</label>
    <input type="text" name="P_link" value="<?php echo $row['Publication_link']; ?>">
    <br>
    <br>
    
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


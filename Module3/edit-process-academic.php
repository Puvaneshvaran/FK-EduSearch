<?php

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

if(count($_POST)>0) {
    mysqli_query($link,"UPDATE academic set Academic_name='" . $_POST['A_name']."' WHERE Academic_id='". $_POST['Academic_id']."'");
    $message = "<p>succesfully updated</p>";


}

$rs = mysqli_query($link, "SELECT * FROM academic WHERE  Academic_id = '". $_GET['Academic_id']. "'");
$row=mysqli_fetch_array($rs);
?>
<html>
    <head>
        <title>UPDATE Academic</title>
    </head>

    <body>
    <form method="post">
    <?php if(isset($message)){echo $message;} ?>
    <input type="hidden" name="Academic_id" value="<?php echo $row['Academic_id']; ?>">
    <label >Academic Name</label>
    <input type="text" name="A_name" value="<?php echo $row['Academic_name']; ?>">
    <br>
    <br>
    
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


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
    <title>Add more</title>
</head>
<body>
    
<form action="addPublicationDB.php" method="post">
     <input type="hidden" name="Publication_id" value=''>
	 <label>Publication Name:</label> <input type="text" name="P_name">
     <label>Publication Date:</label> <input type="date" name="P_date">
     <label>Publication Link:</label> <input type="text" name="P_link">
     
     <input type="hidden" name="expertid" value='<?php echo $id?>'>




     <input type="submit" value="Submit" >
</body>
</html>
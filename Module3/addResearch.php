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
    
<form action="addResearchDB.php" method="post">
     <input type="hidden" name="Research_id" value=''>
	 <label>Title:</label> <input type="text" name="title">
     <label>Role:</label> <input type="text" name="role">
     <label>Start Date:</label> <input type="date" name="S_date">
     <label>End Date:</label> <input type="date" name="E_date">
     <label>Agency:</label> <input type="text" name="agency">
     <label>Status:</label> <input type="text" name="status">
     <input type="hidden" name="expertid" value='<?php echo $id?>'>




     <input type="submit" value="Submit" >
</body>
</html>
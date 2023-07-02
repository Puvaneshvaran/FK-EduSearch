<!--update.php-->'
<!--To update data of change.php into database.-->
<?php
include ("dbase.cf.php");

extract ($_POST);


$tarikh = date("d-m-Y", time());
$masa = date("H:i:s", time());

$query = "UPDATE complainlist SET
	username = '$username',
	type_complaint= '$type_complaint',
	complaint = '$complaint',
	date = '$date',
	time = '$time' WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in change.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='list.php' </script>";
}
?>
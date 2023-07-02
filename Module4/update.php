<!--update.php-->
<!--To update data of update.php into database.-->
<?php
include ("dbase.report.php");

extract ($_POST);

//Dapatkan Tarikh Dan Masa Masuk
$date = date("d-m-Y", time());
$time = date("H:i:s", time());

$query = "UPDATE report SET userID = '$userID', userType = '$userType', date = '$date', time = '$time', post = '$post' WHERE id = '$id'";

$result = mysqli_query($conn,$query) or die ("Could not execute query in update.php");
if($result){
 echo "<script type = 'text/javascript'> window.location='read.php' </script>";
}
?>
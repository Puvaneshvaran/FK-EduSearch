<!-- delete.php -->
<!-- To delete one particular data. -->

<?php

include ("dbase.report.php");

$idURL = $_GET['id'];

$query = "DELETE FROM reportuser WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in readuser.php");

if($result){
echo "<script type= 'text/javascript'> window.location='read.php'</script>";
}


?>
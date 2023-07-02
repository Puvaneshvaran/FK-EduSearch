<!-- buang.php -->
<!-- To delete one particular data. -->

<?php

include ("dbase.cf.php");

$idURL = $_GET['id'];

$query = "DELETE FROM complaintlist WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in change.php");

if($result){
echo "<script type= 'text/javascript'> window.location='list.php'</script>";
}
?>
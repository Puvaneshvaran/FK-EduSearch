<!-- buang.php -->
<!-- To delete one particular data. -->

<?php

include ("dbase.report.php");

$idURL = $_GET['id'];

$query = "DELETE FROM reportexpert WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in readexpert.php");

if($result){
echo "<script type= 'text/javascript'> window.location='StatusReport.php'</script>";
}
?>
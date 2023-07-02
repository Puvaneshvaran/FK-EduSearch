<!-- isikan.php -->
<!-- To insert data of masuk.php into database. -->
<?php

include("dbase.cf.php");


extract( $_POST );
$date = date("d-m-Y", time());
$time = date("H:i:s", time());
$query = "INSERT INTO complaintlist (username,type_complaint,complaint,date,time) VALUES('$username','$type_complaint','$complaint','$date','$time')";

if (mysqli_query($conn, $query)) {
      
   echo "<script type='text/javascript'> window.location='list.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}




?>
<!-- insert.php -->
<!-- To insert data of create.php into database. -->
<?php

include("dbase.report.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$date = date("d-m-Y", time());
$time = date("H:i:s", time());
$query = "INSERT INTO reportuser (userID,userType,date,time,post) VALUES('$userID','$userType','$date','$time','$post' )";

if (mysqli_query($conn, $query)) {
      
   echo "<script type='text/javascript'> window.location='ReportUser.php' </script>";
   
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

?>
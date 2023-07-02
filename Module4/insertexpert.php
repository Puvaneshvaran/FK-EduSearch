<!-- insert.php -->
<!-- To insert data of create.php into database. -->
<?php

include("dbase.report.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$date = date("d-m-Y", time());
$time = date("H:i:s", time());

$query = "INSERT INTO reportexpert (ExpertID,ExpertType,date,time,RepbyExpert) VALUES('$ExpertID','$ExpertType','$date','$time','$RepbyExpert')";

if (mysqli_query($conn, $query)) {
      
   echo "<script type='text/javascript'> window.location='ReportExpert.php' </script>";
   
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}




?>
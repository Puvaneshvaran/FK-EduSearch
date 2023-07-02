<?php

include("dbase.php");

//Dapatkan Tarikh Dan Masa Masuk
extract( $_POST );
$date = date("Y-m-d", time());
$time = date("H:i:s", time());
$query = "INSERT INTO userb (date,time,category,title,Posts) VALUES('$date','$time','$category','$title','$Posts')";

if (mysqli_query($conn, $query)) {
      
   echo "<script type='text/javascript'> window.location='display.php' </script>";
	
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

?>
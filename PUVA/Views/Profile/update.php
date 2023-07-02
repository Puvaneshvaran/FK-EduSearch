<?php

    include('dbase.php');

    extract( $_POST );

    $query = "UPDATE detail SET name = '$name', email = '$email', phone_num = '$phone_num', dob = '$dob' WHERE id = 1";

    $result = mysqli_query($conn,$query) or die ("Could not execute query in index.php");

    if($result){
     echo "<script type = 'text/javascript'> window.location='index.php' </script>";
    }

    mysqli_close($conn);
?>
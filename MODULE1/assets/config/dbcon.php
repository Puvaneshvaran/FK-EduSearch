<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kss";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully";


    function check_input($data) {
        $data = trim($data);
        $data = str_replace("'",'',$data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    
?>
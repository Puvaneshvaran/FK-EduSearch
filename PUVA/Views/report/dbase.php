<?php

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$db_name = "kss3"; /* Database name */

// Connect to the database
$con_kss3 = mysqli_connect($host, $user, $password, $db_name);

// Check connection
if (!$con_kss3) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query the userb table
$userb_table = "userb";
$query_userb = "SELECT * FROM $userb_table";
$result_userb = mysqli_query($con_kss3, $query_userb);



// Query the events table
$events_table = "events";
$query_events = "SELECT * FROM $events_table";
$result_events = mysqli_query($con_kss3, $query_events);

// Perform operations on the query results
// Fetch data from $result_userb, $result_class, $result_events

// Close the database connection
mysqli_close($con_kss3);
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: 'Times New Roman', Times, serif;
}

.navbar {
  overflow: hidden;
  background-color: #ff8b3d;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color:grey;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color:#ffaf7a;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.complaint {
    border-style:solid;
    border-color: #CC7722;
    border-radius: 5px;
    border-style: inset;
    font-size: 20px;
   text-align: center;
   background-color :white;
}

    body {
        background-image: url("assets/img/background.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
</head>
<body>

<div class="navbar">
      <a href="Module4/ComplaintFeedback/updatestatus.php">Status Update</a>
      <a href="Module4/ComplaintFeedback/UserComplaintReport.php">Report</a>
      <a href="Module4/ComplaintFeedback/statuscomplaint.php">Complaint List</a>
      <a href="index.php">HOME</a>
    </div>
  </div> 
</div>


<h3 align="center">COMPLAINT OF USER MADE FOR EXPERT FEEDBACK PAGE</h3><br>
<div class="complaint">
<?php

 $con = mysqli_connect("localhost","root","");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysqli_select_db($con,"kss3");

  $result = mysqli_query($con,"select id FROM complaintlist");
  
  $id = mysqli_num_rows($result);
  
    echo "Total Number of Complaint Has Been Made = " . $id; echo "<br> <br>";
 
  mysqli_close($con);
?>
<br>

<center>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px" align="center"></canvas>

<script>
var xValues = ["","00:00-12:00", "12:01-23:59",""];
var yValues = [0, 2,3];
var barColors = ["red", "green", "blue",""];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "COMPLAINT MADE BY TODAY"
    }
  }
})
</script>
</center>

<?php
// set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>



</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
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
</style>
</head>
<body>

<div class="navbar">
  <a href="home.php">Home</a>
  <div class="dropdown">
    <button class="dropbtn">User Complaint 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ComplaintFeedback/updatestatus.php">Status Update</a>
      <a href="UserComplaintReport.php">Report</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">User Report<i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ReportExpert.php">Expert</a>
      <a href="ReportUser.php">General User</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Manage User
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ManageExpert.php">Expert</a>
      <a href="ManageUser.php">General User</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">View Status
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ComplaintFeedback/statuscomplaint.php">Complaint</a>
      <a href="StatusReport.php">Report</a>
    </div>
  </div> 
</div>


<h3>WELCOME ADMIN</h3>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<body>

<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = ["","Expert", "User",""];
var yValues = [0, 80,85];
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
      text: "Percentage User Statisfaction (%)"
    }
  }
})
</script>

<?php
// set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>



</body>
</html>
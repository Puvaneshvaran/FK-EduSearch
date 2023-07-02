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
  <i class="fa fa-home"></i>
  <div class="dropdown">
    <button class="dropbtn">User Complaint 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="main.php">Type of complaint</a>
      <a href="main.php">Report</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">User Report 
      <i class="fa fa-caret-down"></i>
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
      <a href="StatusComplain.php">Complaint</a>
      <a href="StatusReport.php">Report</a>
    </div>
  </div> 
</div>

<h3>Dropdown Menu inside a Navigation Bar</h3>
<p>Hover over the "Dropdown" link to see the dropdown menu.</p>

</body>
</html>

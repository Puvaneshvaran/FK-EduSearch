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

body {
  background-image: url('assets/img/background.jpg');
   /* Full height */
   height: 140%; 

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat;
background-size: cover;

} 
</style>
</head>
<body>

<div class="navbar">
<a href="../index.php">Dashboard</a>
  
  
  
  <div class="dropdown">
    <button class="dropbtn">User Report 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="ReportUser.php">General User</a>
      <a href="ReportExpert.php">Expert</a>
    </div>
  </div> 
  
  <a href="chartt.php">View Report Chart</a>
</div>




<h2>LIST OF REPORT FOR <mark>USER</mark></h2>




<?php
// set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>
<div align="center">
<table width="500" height="300" border="3" bordercolor="#ef9273">
  <tr>
  
    <td height="100" bgcolor="#fef9f8"><p align="center" class="style3">Knowledge Sharing System (FK-EduSearch)</p> <p align="center"><strong>List of Report(User)</strong></p>
      <div align="center">
        <span class="style3">DATE : <?php echo date("d-m-Y"); ?></span>
      </div>
      	<p align="center" class="style1"></p>
 	<div align="center">
          <span class="style3">TIME : <?php echo date("H:i", time()); ?></span>
      	</div>
	<br>
	<p align="center" >
	  [<a href="readuser.php">View Report</a>]
	</p>
  </tr>
</table>
<p class="style1">&nbsp;</p>
</div>

</body>
</html>
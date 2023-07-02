<!-- index.php -->
<!-- Interface of Complaint And Feedback -->
<html>
<head>
<title>Complaint/ Feedback</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3
{font-familly:Verdana, Arial, Helvetica, sans-serif;
font-siize: 12px;
font-weight: bold;
}
-->
</style>
<style>
.button {
  background-color: #CC7722;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<body>
<?php
// set the default time zone to use in Malaysia
date_default_timezone_set('Asia/Kuala_Lumpur');
?>
<br>
<br>
<br>
<div align="center">
<table width="500" height="300" border="3" bordercolor="#ef9273">
  <tr>
  
    <td height="100" bgcolor="#fef9f8"><p align="center" class="style3">Knowledge Sharing System (FK-EduSearch)</p> <p align="center"><strog>Complaint For Expert Feedback/Feedback</strong></p>
      <div align="center">
        <span class="style3">DATE : <?php echo date("d-m-Y"); ?></span>
      </div>
      	<p align="center" class="style1"></p>
 	<div align="center">
          <span class="style3">TIME : <?php echo date("H:i", time()); ?></span>
      	</div>
	<br>
	<p align="center" >
	<a href="c&f.php" class="button">Create Complaint</a>
	</p>
  </tr>
</table>
<p class="style1">&nbsp;</p>
</div>
</body>
</html>

<!-- change.php -->
<!-- Interface of update data. -->

<?php
include("dbase.cf.php");
if (isset($_POST['submit])){
	$type_complaint=$POST['type_complaint];
	$sql="INSERT INTO 'type_complaint('type_complaint')VALUES('$type_complaint')";
	

$idURL = $_GET['id'];

$query = "SELECT * FROM  WHERE id = '$idURL'";
$result = mysqli_query($conn,$query) or die ("Could not execute query in change.php");
$row = mysqli_fetch_assoc($result);

	$id = $row["id"];
    $username=$row["username"];
	$type_complaint= $row["type_complaint"];
	$complaint = $row["complaint"];
	$date = $row["date"];
	$time = $row["time"];

//@mysql_free_result($result);
?>
<html>
<head>
<title>Complaint</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<!--username = '$username',
	type_complaint= '$type_complaint',
	complaint = '$complaint', -->
	
<body bgcolor="#FFFFFF" text="#000000">
<form method="post" action="update.php">
User Name:
<input type ="text" name="username" size="50" value="<?php echo $username; ?>">
<br>
<form method="POST">
Type of Complaint:
<div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Type of Complaint</label>
                                    <select class="form-select">
                                         <option selected> </option>
							   <option value="">Unsatisfied Expert's Feedback</option>  
                                <option value="On Hold">Wrongly Assigned Research Area</option>  
                                <option value="In Investigation">Answer Not Specific</option>  
                                <option value="Resolved">Others</option>  
                                    </select>
                                </div>
                            </div>
Complaint: <br>
<textarea name="complaint" cols="100" rows="8"><?php echo $complaint; ?></textarea>
<br>
<input type ="hidden" name="id" value="<?php echo $idURL; ?>">
<input type ="submit" value="Ubah">
<input type ="reset" value="Semula">
<br>
</form>
<hr>
<div align="centre">[ <a href="list.php"]>Balik ke Paparan</a> |
<a href="index.php">Back</a> |

</body>
</html>
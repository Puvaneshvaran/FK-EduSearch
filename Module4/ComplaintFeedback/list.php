<!-- list.php -->
<!-- To display all information of database. -->
<html>
<head>
<title>List of Complaint and Feedback</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body bgcolor="#FFFFFF" text="#000000">
<ol>
<?php
include("dbase.cf.php");

$query = "SELECT * FROM complaintlist";
$result = mysqli_query($conn,$query);

if (mysqli_num_rows($result) > 0){
    // output data of each row
    while($row = mysqli_fetch_assoc($result)){
	$id = $row["id"];
    $username=$row["username"];
	$type_complaint= $row["type_complaint"];
	$complaint = $row["complaint"];
	$date = $row["date"];
	$time = $row["time"];
	$status = $row["status"];
	?>
	<li>
	User Name : <?php echo $username; ?><br>
	Type of Complaint: <?php echo $type_complaint; ?><br>
	Complaint: <?php echo $complaint; ?><br>
	Date : <?php echo "$date"; ?><br>
	Time : <?php echo "$time"; ?><br>
	Status : <?php echo "$status"; ?><br> [<a href="delete.php?id=<?php echo $id; ?>">Delete</a>]<br>
    </li>
	<?php
    }
} else {
    echo "0 results";

}
?>
</ol>
<div align="center">[ <a href="index.php">BACK</a> |
<a href="c&f.php">Add Complaint for Feedback from expert</a> ] </div>
</body>
</html>
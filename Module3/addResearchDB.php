<html>
    <body>
        
    
<?php

$researchid=$_POST["Research_id"];
$title=$_POST["title"];
$role=$_POST["role"];
$date1=$_POST["S_date"];
$date2=$_POST["E_date"];
$agency=$_POST["agency"];
$status=$_POST["status"];
$expertid=$_POST["expertid"];

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

$query = "insert into research values('','$title','$role','$date1','$date2','$agency','$status','$expertid')"
or die(mysqli_connect_error());

$result = mysqli_query($link, $query);

if($result) 
	        {
		        
                    
					echo' <p>Data Inserted completed to database</p> 
                    <a href="myprofile2.php?expert_id='.$expertid.'">back to home</a>
                    ';
					
		}
		else 
	        {
			        
	            die("Insert failed" .  mysqli_error($link));
	        }
?>
</body>
</html>
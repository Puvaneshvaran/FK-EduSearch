<html>
    <body>
        
    
<?php

$P_name=$_POST["P_name"];
$P_date=$_POST["P_date"];
$P_link=$_POST["P_link"];
$expertid=$_POST["expertid"];

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

$query = "insert into publication values('','$P_date','$P_name','$P_link','$expertid')"
or die(mysqli_connect_error());

$result = mysqli_query($link, $query);

if($result) 
	        {
		        
                    
					echo' <p>Data Publication Inserted completed to database</p> 
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
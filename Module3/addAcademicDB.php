<html>
    <body>
        
    
<?php

$A_name=$_POST["A_name"];

$expertid=$_POST["expertid"];

$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

$query = "insert into academic values('','$A_name','$expertid')"
or die(mysqli_connect_error());

$result = mysqli_query($link, $query);

if($result) 
	        {
		        
                    
					echo' <p>Data Academic Inserted completed to database</p> 
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
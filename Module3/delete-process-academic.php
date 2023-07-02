<?php

if(isset($_GET["Academic_id"])) {

    $id= $_GET["Academic_id"];
    $eid=$_GET["Expertid"];


$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

$query= "DELETE FROM academic WHERE Academic_id=$id";

$result = mysqli_query($link, $query);

if($result) 
	        {
		        
                    echo' <p>Data Academic Delete</p> 
                    <a href="myprofile2.php?expert_id='.$eid.'">back to home</a>
                    ';
                    
					
		}
		else 
	        {
			        
	            die("Delete failed" .  mysqli_error($link));
	        }



}
?>
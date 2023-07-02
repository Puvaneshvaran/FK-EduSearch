<?php

if(isset($_GET["Research_id"])) {

    $id= $_GET["Research_id"];
    $eid=$_GET["Expertid"];


$link = mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());

mysqli_select_db($link, "kss3") or die(mysqli_error($link));

$query= "DELETE FROM research WHERE Research_id=$id";

$result = mysqli_query($link, $query);

if($result) 
	        {
		        
                    echo' <p>Data Delete</p> 
                    <a href="myprofile2.php?expert_id='.$eid.'">back to home</a>
                    ';
                    
					
		}
		else 
	        {
			        
	            die("Delete failed" .  mysqli_error($link));
	        }



}
?>
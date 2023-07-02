<?php  
 //Database connectivity  
 $con=mysqli_connect('localhost','root','','kss3');  
 //Fetch data from database  
 $sql=mysqli_query($con,"select * from complaintlist");  

  //Get Update id and status  
  if (isset($_GET['id']) && isset($_GET['status'])) {  
	$id=$_GET['id'];  
	$status=$_GET['status'];  
	mysqli_query($con,"update complaintlist set status='$status' where id='$id'");  
	header("location:updatestatus.php");  
	die();  
}



 ?> 




<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Complaint Status</title>

 <style>
   table, th, td {
    border-style:solid;
    border-color: #CC7722;
    border-radius: 5px;
    text-align: center;

    }
    table.center {
      margin-left: auto; 
     margin-right: auto;
    }

    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 23px ;
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

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: grey;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #ffaf7a;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
      <a href="updatestatus.php">Status Update</a>
      <a href="UserComplaintReport.php">Report</a>
      <a href="statuscomplaint.php">Complaint</a>
      <a href="/compiled_MODULE-1/Complaint.php">Home</a>
     
    </div>
  </div> 
</div>
 <div class="container">  
<h2 align="center">UPDATE COMPLAINT </h2>
      <table class="center" border="1">  
          <br>
           <tr>  
                <th>ID</th>  
                <th>User Name</th>  
			 <th>Type Of Complaint </th>
                <th>Date </th>  
			 <th>Time </th>
                <th>Status</th>  
			 <th>Action</th>  

           </tr> 
		   
		   
		   <?php  
           $i=1;  
           if (mysqli_num_rows($sql)>0) {  
                 while ($row=mysqli_fetch_assoc($sql)) { ?>  
                 <tr>  
                      <td><?php echo $i++ ?></td>  
                      <td><?php echo $row['username'] ?></td> 
					  <td><?php echo $row['type_complaint'] ?></td>  
					  <td><?php echo $row['date'] ?></td>  
					  <td><?php echo $row['time'] ?></td>  
					  
					  
					   

                      <td>  
                           <?php 
						   
						   
					    if ($row['status']=='On Hold') {  
							echo "On Hold";  
					   }if ($row['status']=='In Investigation') {  
							echo "In Investigation";  
					   }if ($row['status']=='Resolved') {  
							echo "Resolved";  
					   }  
					   ?>  
				  </td>  
				  
				  <td>
				   <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['id'] ?>')">  
                                <option value="">Update Status</option>  
                                <option value="On Hold">On Hold</option>  
                                <option value="In Investigation">In Investigation</option>  
                                <option value="Resolved">Resolved</option>  
                           </select>  
                         </td>
					</tr>
<?php }
					}?>
     
	  


 <script type="text/javascript">  
      function status_update(value,id){  
           //alert(id);  
           let url = "http://localhost/compiled_MODULE-1/Module4/ComplaintFeedback/updatestatus.php";  
           window.location.href= url+"?id="+id+"&status="+value;  
      }  
 </script>  

 </body>  
 </html>  
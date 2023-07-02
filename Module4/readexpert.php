<?php
//Database connectivity  
$con = mysqli_connect('localhost', 'root', '', 'kss3');
//Fetch data from database  
$sql = mysqli_query($con, "select * from reportexpert");

//Get Update id and status  
if (isset($_GET['id']) && isset($_GET['statusExpert'])) {
     $id = $_GET['id'];
     $statusExpert = $_GET['statusExpert'];
     mysqli_query($con, "update reportexpert set statusExpert='$statusExpert' where id='$id'");
     header("location:readexpert.php");
     die();
}





?>




<!DOCTYPE html>

<html>

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="assets/css/style2.css">

     <title> Read User Report</title>
     

     <style type="text/css">
          * {
               padding: 1;
               margin: 0;
               box-sizing: border-box;
          }

          body {
               background: #ccc;
               display: flex;
               justify-content: center;
          }

          .container {
               width: 150%;
               max-width: 900px;
               margin: 5rem auto;
          }

          .container table {
               width: 150%;
               margin: auto;
               border-collapse: collapse;
               border : 100px ;
               border-color: #96D4D4;
               font-size: 2rem;
               
          }

          .container table th {
               background: #5F8575;
               color: #fff;
               font-family: arial, sans-serif;
               font-size: 2rem;
               padding:10px;
               font-size : 20px;
          }

          .container table td {
               background: #AFE1AF;
               font-family: arial, sans-serif;
               color: black;
               padding:10px;
               font-size : 20px;
               
          }

          select {
               width: 100%;
               padding: 0.5rem 0;
               font-size: 1rem;
          }
     </style>
</head>

<body>
     <div class="container">
          <table border="2">
               <tr>
                    <th>ID</th>
                    <th>Expert ID</th>
                    <th>User Type</th>
                    <th>Date </th>
                    <th>Time </th>
                    <th>Post </th>
                    <th>Status</th>
                    <th>Action</th>

               </tr>


               <?php
               $i = 1;
               if (mysqli_num_rows($sql) > 0) {
                    while ($row = mysqli_fetch_assoc($sql)) { ?>
                         <tr>
                              <td><?php echo $i++ ?></td>
                              <td><?php echo $row['ExpertID'] ?></td>
                              <td><?php echo $row['ExpertType'] ?></td>
                              <td><?php echo $row['date'] ?></td>
                              <td><?php echo $row['time'] ?></td>
                              <td><?php echo $row['RepbyExpert'] ?></td>



                              <td>
                                   <?php


                                   if ($row['statusExpert'] == 'On Hold') {
                                        echo "On Hold";
                                   }
                                   if ($row['statusExpert'] == 'In Investigation') {
                                        echo "In Investigation";
                                   }
                                   if ($row['statusExpert'] == 'Resolved') {
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
                         </tr>
               <?php }
               } ?>
        

     <?php
$con = mysqli_connect("localhost","root","");


mysqli_select_db($con,"kss3");

  $result = mysqli_query($con,"select id FROM reportexpert");
  

  $id = mysqli_num_rows($result);



  // $total = $row[0];

echo '<span style="font-size: 40px;">Total Number of Report: ' . $id . '</span><br><br><br><br>';


  mysqli_close($con);
?>



     <script type="text/javascript">
          function status_update(value, id) {
               //alert(id);  
               let url = "/compiled_MODULE-1/Module4/readexpert.php";
               window.location.href = url + "?id=" + id + "&statusExpert=" + value;
          }
     </script>

     
     <p style="text-align: left; position: fixed; bottom: 150px; width: 100%; font-size: 24px;">
  [<a href="StatusReport.php" style="font-size: 24px;">View Status Report</a>]
</p>



</body>

</html>
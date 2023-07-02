<?php
//Database connectivity  
$con = mysqli_connect('localhost', 'root', '', 'kss3');
//Fetch data from database  
$sql = mysqli_query($con, "select * from complaintlist");

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
   table, th, td {
    border-style:solid;
    border-color: #CC7722;
    border-radius: 5px;

    }
    table.center {
      margin-left: auto; 
     margin-right: auto;
    }

    body {
      font-family: 'Times New Roman', Times, serif;
      font-size: 20px ;
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
    <h2 align="center">COMPLAINT LIST </h2>
    <table class="center" border="0">
      <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>Type Complaint</th>
		<th>Complaint </th>
        <th>Date </th>
        <th>Time </th>
        <th>Status</th>
        <th>Action</th>

      </tr>
      <?php
      $i = 1;
      if ($num = mysqli_num_rows($sql) > 0) {
        while ($result = mysqli_fetch_assoc($sql)) {
          echo "  
                          <tr class='data'>  
                          <td>" . $i++ . "</td>  
                               <td>" . $result['username'] . "</td>  
                               <td>" . $result['type_complaint'] . "</td>  
							   <td>" . $result['complaint'] . "</td> 
                               <td>" . $result['date'] . "</td>  
                               <td>" . $result['time'] . "</td>  
                               <td>" . $result['status'] . "</td>  
                               <td><a href='delete.php?id=" . $result['id'] . "' id='btn'>Delete</a></td>  
                          </tr>  
                     ";
        }
      }
      ?>
    </table>
    <br>


        <?php
        // set the default time zone to use in Malaysia
        date_default_timezone_set('Asia/Kuala_Lumpur');
        ?>

</body>

</html>
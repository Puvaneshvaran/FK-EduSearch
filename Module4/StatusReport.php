<?php
//Database connectivity  
$con = mysqli_connect('localhost', 'root', '', 'kss3');
//Fetch data from database  
$sql = mysqli_query($con, "select * from reportuser");

?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
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
               background:  	 	#F4A460;
               color: #fff;
               font-family: arial, sans-serif;
               font-size: 2rem;
               padding:10px;
               font-size : 20px;
          }

          .container table td {
               background:  	 	#F5DEB3;
               font-family: arial, sans-serif;
               color: black;
               padding:10px;
               font-size : 20px;
               
          }
  </style>
</head>

<body>

  <div class="navbar">
    <a href="../index.php">Dashboard</a>
  
    <div class="dropdown">
      <button class="dropbtn">View Status
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="StatusReport.php">Report</a>
      </div>
    </div>

    <a href="chartuser.php">Status Chart (User)</a>
    <a href="chartexpert.php">Status Chart (Expert)</a>

  </div>

  <div class="container">
    <h2>View Report by User </h2>
    <table border="2">
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>User Type</th>
        <th>Date </th>
        <th>Time </th>
        <th>Post </th>
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
                               <td>" . $result['userID'] . "</td>  
                               <td>" . $result['userType'] . "</td>  
                               <td>" . $result['date'] . "</td>  
                               <td>" . $result['time'] . "</td>  
                               <td>" . $result['post'] . "</td>  
                               <td>" . $result['status'] . "</td>  
                               <td><a href='deleteuser.php?id=" . $result['id'] . "' id='btn'>Delete</a></td>  
                          </tr>  
                     ";
        }
      }
      ?>
    </table>
    <br>

    <div class="container">
      <h2>View Report by Expert</h2>
      <table border="2">
        <tr>
          <th>ID</th>
          <th>Expert ID</th>
          <th>Expert Type</th>
          <th>Date </th>
          <th>Time </th>
          <th>Post </th>
          <th>Status</th>
          <th>Action</th>

        </tr>

        <?php
        $sql = mysqli_query($con, "select * from reportexpert");
        $i = 1;
        if ($num = mysqli_num_rows($sql) > 0) {
          while ($result = mysqli_fetch_assoc($sql)) {
            echo "  
                          <tr class='data'>  
                          <td>" . $i++ . "</td>  
                               <td>" . $result['ExpertID'] . "</td>  
                               <td>" . $result['ExpertType'] . "</td>  
                               <td>" . $result['date'] . "</td>  
                               <td>" . $result['time'] . "</td>  
                               <td>" . $result['RepbyExpert'] . "</td>  
                               <td>" . $result['statusExpert'] . "</td>  
                               <td><a href='deleteexpert.php?id=" . $result['id'] . "' id='btn'>Delete</a></td>  
                          </tr>  
                     ";
          }
        }
        ?>




        <?php
        // set the default time zone to use in Malaysia
        date_default_timezone_set('Asia/Kuala_Lumpur');
        ?>

</body>

</html>
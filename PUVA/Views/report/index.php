<?php
        include("dbase.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="../report/styleSheet/index_style.css">
    <link href='../report/jquery-ui-1.13.0/jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src='../report/jquery-ui-1.13.0/jquery-ui.min.js' type='text/javascript'></script>
   <script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
   </script>
   <style>
                table{
            border: 1px solid black;
            height: 50%;
            width: 100%;
            margin-bottom: 20px;
        }

        h1{
            text-align: center;
        }

        table{
            background-color: rgb(41, 134, 114);;
        }

        th{
            height: 50%;
            border: 1px solid black;
            background-color: lightgreen;
        }

        td{
            text-align: center;
            height: 50%;
            border: 1px solid black;
            background-color: lightyellow;
        }

        .btn {
        background-color: #00664d;
        border: none;
        color: white;
        padding: 12px 30px;
        cursor: pointer;
        font-size: 20px;
        }

        /* Darker background on mouse-over */
        .btn:hover {
        background-color: #00b386;
        }
   </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php" style="text-decoration: none;">Home</a>
        <a href="../broadcast/index.php" style="text-decoration: none;">Broadcast</a>
        <a href="../viewProgress/index.php" style="text-decoration: none;">Progress</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">Report Detail</h1>


    <fieldset style="border: 2px solid black;">
    <br>
        <center>
            <form method='post' action=''>
                Start Date <input type='text' class='dateFilter' name='fromDate' value='<?php if(isset($_POST['fromDate'])) echo $_POST['fromDate']; ?>' required>
            
                End Date <input type='text' class='dateFilter' name='endDate' value='<?php if(isset($_POST['endDate'])) echo $_POST['endDate']; ?>' required>

                <input type='submit' name='but_search' value='Search'>
            </form>
        </center>

    <!-- Broadcast List -->
        <div style='height: 80%; overflow: auto;' >
    <h2 style="text-align: center;"> Broadcast:</h2>
    <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Category</th>
            <th>Title</th>
            <th>Posts</th>
        </tr>

        <?php
        // Establish the database connection
        $con_kss3 = mysqli_connect("localhost", "root", "", "kss3");

        // Check connection
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $query_userb = "SELECT * FROM kss3.userb WHERE id";

        // Date filter
        if(isset($_POST['but_search'])){
            $fromDate = $_POST['fromDate'];
            $endDate = $_POST['endDate'];

            if(!empty($fromDate) && !empty($endDate)){
                $query_userb .= " AND `date` BETWEEN '".$fromDate."' AND '".$endDate."'";
            }
        }

        // Sort
        $query_userb .= " ORDER BY `date` ASC";
        $result = mysqli_query($con_kss3, $query_userb);

        // Check if records found or not
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                $id = $row["id"];
                $date = $row["date"];
                $time = $row["time"];
                $category = $row["category"];
                $title = $row["title"];
                $Posts = $row["Posts"];

                echo "<tr>";
                echo "<td hidden>". $id ."</td>";
                echo "<td>". $date ."</td>";
                echo "<td>". $time ."</td>";
                echo "<td>". $category ."</td>";
                echo "<td>". $title ."</td>";
                echo "<td>". $Posts ."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='5'>No record found.</td>";
            echo "</tr>";
        }

        // Close the database connection
        mysqli_close($con_kss3);
        ?>
    </table>
</div>
<br>


        <br>

              <!-- Calendar List -->
        <div style='height: 80%; overflow: auto;' >

        <h2 style="text-align: center;">Calendar Event:</h2>

            <table border='1' width='100%' style='border-collapse: collapse;margin-top: 20px;'>
                <tr>
                    <th>Start Event</th>
                    <th>End Event</th>
                    <th>Title</th>
                </tr>

            <?php

            // Establish the database connection
           $con_kss3 = mysqli_connect("localhost", "root", "", "kss3");
         
        // Check connection
        if(mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }

        $query_events = "SELECT * FROM kss3.events WHERE id";

            // Date filter
            if(isset($_POST['but_search'])){
                $fromDate = $_POST['fromDate'];
                $endDate = $_POST['endDate'];

                if(!empty($fromDate) && !empty($endDate)){
                    $query_events.= " and start_event 
                                between '".$fromDate."' and '".$endDate."' ";
                }
                }

                // Sort
                $query_events .= " ORDER BY start_event ASC";
                $result = mysqli_query($con_kss3,$query_events);

                // Check records found or not
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $start_event = $row["start_event"];
                    $end_event = $row["end_event"];
                    $title = $row["title"];

                    echo "<tr>";
                    echo "<td hidden>". $id ."</td>";
                    echo "<td>". $start_event ."</td>";
                    echo "<td>". $end_event ."</td>";
                    echo "<td>". $title ."</td>";
                    echo "</tr>";
                }
                }else{
                echo "<tr>";
                echo "<td colspan='3'>No record found.</td>";
                echo "</tr>";
                }
                ?>
            </table>
        </div>

        <br>
<!-- 
        <center>
            <a href="../report/userView.php" download><button class="btn">Download</button></a>
        </center> -->
    </fieldset>
</body>
</html>
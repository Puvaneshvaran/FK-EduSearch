<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <script>
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
    </style>
</head>
<body>
    <!-- <center>
        <img class="logo" src="../../logo/logo.png" alt="UMP_Logo" style="width: 50%; height:50%;">
    </center> -->
    <br>
    <br>
    <fieldset>

        <h1>Report Details</h1>

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
            $query_broadcast = "SELECT * FROM student WHERE id";

            // Date filter
            if(isset($_POST['but_search'])){
                $fromDate = $_POST['fromDate'];
                $endDate = $_POST['endDate'];

                if(!empty($fromDate) && !empty($endDate)){
                    $query_broadcast .= " and date 
                                between '".$fromDate."' and '".$endDate."' ";
                }
                }

                // Sort
                $query_broadcast .= " ORDER BY date DESC";
                $result = mysqli_query($con_broadcast,$query_broadcast);

                // Check records found or not
                if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $date = $row["date"];
                    $time = $row["time"];
                    $category = $row["category"];
                    $title = $row["title"];
                    $announcement = $row["announcement"];

                    echo "<tr>";
                    echo "<td hidden>". $id ."</td>";
                    echo "<td>". $date ."</td>";
                    echo "<td>". $time ."</td>";
                    echo "<td>". $category ."</td>";
                    echo "<td>". $title ."</td>";
                    echo "<td>". $announcement ."</td>";
                    echo "</tr>";
                }
                }else{
                echo "<tr>";
                echo "<td colspan='5'>No record found.</td>";
                echo "</tr>";
                }
                ?>
            </table>
        </div>

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
            $query_calendar = "SELECT * FROM events WHERE id";

            // Date filter
            if(isset($_POST['but_search'])){
                $fromDate = $_POST['fromDate'];
                $endDate = $_POST['endDate'];

                if(!empty($fromDate) && !empty($endDate)){
                    $query_calendar.= " and start_event 
                                between '".$fromDate."' and '".$endDate."' ";
                }
                }

                // Sort
                $query_calendar .= " ORDER BY start_event DESC";
                $result = mysqli_query($con_calendar,$query_calendar);

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
    </fieldset>
</body>
</html>
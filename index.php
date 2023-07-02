<?php
    session_start();
    if(isset($_SESSION['admin_id'])){
        $admin_id = $_SESSION['admin_id'];
    }else{
        echo "<script>window.location.href='login.php'</script>";
    }
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://kit.fontawesome.com/813e47687a.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style2.css">

</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" width="80%" alt="" srcset="">
        </a>
        <div class="navbar-items">
            <a class="nav-link active" href="index.php">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
            <a class="nav-link" href="users.php">
                <i class="fa fa-users"></i> Manage User
            </a>

            <a class="nav-link" href="Module4/ReportExpert.php">
                <i class="fa fa-users"></i> Report Details
            </a>

            <a class="nav-link" href="Module4/StatusReport.php">
                <i class="fa fa-users"></i> View Status Report
            </a>

            <a class="nav-link" href="Complaint.php">
                <i class="fa fa-users"></i> Complaint
            </a>


            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </div>
    </nav>           
                 
                <script src="https://kit.fontawesome.com/813e47687a.js" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>



                <?php
include('assets/config/dbcon.php');

// Fetch data from the "user" table
$query = "SELECT role, COUNT(*) as count FROM user GROUP BY role";
$result = mysqli_query($conn, $query);

$data = array();
$totalUsers = 0; // Variable to store the total number of users

while ($row = mysqli_fetch_assoc($result)) {
    $count = (int) $row['count'];
    $totalUsers += $count;
    if ($row['role'] === '4') {
        $data[] = array('name' => 'Admin', 'y' => $count);
    } elseif ($row['role'] === '1') {
        $data[] = array('name' => 'Staff', 'y' => $count);
    } elseif ($row['role'] === '2') {
        $data[] = array('name' => 'Expert', 'y' => $count);
    } elseif ($row['role'] === '3') {
        $data[] = array('name' => 'Student', 'y' => $count);
    }
}

// Convert the PHP data to a JSON string
$json_data = json_encode($data);
?>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<style>
    body {
        background-image: url("assets/img/background.jpg");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .container {
        position: relative;
        z-index: 1;
    }

    .highcharts-figure {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
    }
</style>

<div class="container">
    <div class="dashboard_header">
        <!-- Your header content here -->
    </div>
    <div class="dashboard_body">
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>
</div>

<script>
    // Use the PHP-generated JSON data in the chart configuration
    var chartData = <?php echo $json_data; ?>;



    // Radialize the colors
Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: {
                cx: 0.5,
                cy: 0.3,
                r: 0.7
            },
            stops: [
                [0, color],
                [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    })
});


    // Find the total number of users from the last data point
    var totalUsers = 0;
    for (var i = 0; i < chartData.length; i++) {
        totalUsers += chartData[i].y;
    }

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Type of users in FK-EDUSearch (Total: ' + totalUsers + ' users)',
            align: 'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    connectorColor: 'silver'
                }
            }
        },

        series: [{
            name: 'Number of Users',
            data: chartData
        }]
    });
</script>



//


    </body>
    
</html>

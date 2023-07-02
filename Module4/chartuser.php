<?php

// Connect to the MySQL database
$con = mysqli_connect("localhost", "root", "", "kss3");

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}



// Execute the query to retrieve the data from the `reportuser` table
$query = "SELECT status, COUNT(*) AS count FROM reportuser GROUP BY status";
$result = mysqli_query($con, $query);

// Check if the query was successful
if ($result) {
    // Prepare the data for the pie chart
    $dataArray = array();
    $dataArray[] = ['Status', 'Count'];

    // Loop through the retrieved rows and add them to the data array
    while ($row = mysqli_fetch_assoc($result)) {
        $status = $row['status'];
        $count = (int) $row['count'];
        $dataArray[] = [$status, $count];
    }

    // Convert the data array to JSON format
    $dataJSON = json_encode($dataArray);

    // Echo the data JSON to be used in the JavaScript code
    echo "<script>var chartData = $dataJSON;</script>";
} else {
    // Handle the case when the query fails
    echo "Error executing query: " . mysqli_error($connection);
}

?>
<!-- Include the Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Create a div element to hold the chart -->
<div id="chart_div"></div>

<!-- Add CSS to style the chart container -->
<style>
    #chart_div {
        width: 800px;
        height: 600px;
        margin: 0 auto;
    }
</style>

<!-- Add JavaScript to generate the chart -->
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable(chartData);

        var options = {
    title: 'Status Distribution for User',
    titleTextStyle: {
        fontSize: 20, // Set the font size for the title
        bold: true 
    },
    is3D: true,
    pieSliceText: 'percentage',
    pieSliceTextStyle: {
        fontSize: 25,
        bold: true
    },
    slices: {
        2: { textStyle: { fontSize: 16 } },
        3: { textStyle: { fontSize: 16 } }
        
    },
    width: 800,
    height: 600,
    legend: {
        position: 'bottom',
        alignment: 'center',
        textStyle: {
            fontSize: 20
        }
    },
    backgroundColor: {
        fill: 'transparent'
    },
    chartArea: {
        left: 50,
        top: 50,
        width: '80%',
        height: '80%'
    }
};

        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));

        chart.draw(data, options);
    }
</script>



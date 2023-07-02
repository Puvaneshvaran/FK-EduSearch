<?php

// Connect to the MySQL database
$con = mysqli_connect("localhost", "root", "", "kss3");

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the total rows from table1
$query1 = "SELECT COUNT(*) AS total_rows FROM reportuser";
$result1 = mysqli_query($con, $query1);
$row1 = mysqli_fetch_assoc($result1);
$totalRowsTable1 = $row1['total_rows'];

// Query to get the total rows from table2
$query2 = "SELECT COUNT(*) AS total_rows FROM reportexpert";
$result2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_assoc($result2);
$totalRowsTable2 = $row2['total_rows'];

$total = $totalRowsTable1 + $totalRowsTable2;

?>

<!-- Include the Google Charts library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Create a div element to hold the chart -->
<div id="chart_div" style="width: 1000px; height: 800px; margin: 0 auto;"></div>



<!-- Add JavaScript to generate the chart -->
<script type="text/javascript">
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Report', 'Total Report'],
      ['User', <?php echo $totalRowsTable1; ?>],
      ['Expert', <?php echo $totalRowsTable2; ?>],
      ['Total Report', <?php echo $total; ?>]
    ]);

    var options = {
  chart: {
    title: 'Barchart',
    subtitle: 'Total Report Made by User and Expert',
  },
  
  colors: ['#FFCCCB', '#DC3912', '#FF9900'],
  legend: { position: 'none' },
  hAxis: { title: 'Type of User' },
  vAxis: { title: 'Number of Report' },
  titleTextStyle: { bold: true } 
  
};


    var chart = new google.charts.Bar(document.getElementById('chart_div'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>


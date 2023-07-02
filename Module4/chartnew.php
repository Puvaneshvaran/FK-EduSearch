<?php

// Connect to the MySQL database
$con = mysqli_connect("localhost", "root", "", "kss3");

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve the data
$sql = "SELECT SUM(id) AS total FROM reportuser";

// Execute the query
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the data
    $row = mysqli_fetch_assoc($result);
    $total = $row['total'];

    // Proceed with the rest of the steps
} else {
    echo "Error: " . mysqli_error($connection);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        // Get the total value from PHP
        var total = <?php echo $total; ?>;

        // Create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Total'],
                datasets: [{
                    label: 'Total',
                    data: [total],
                    backgroundColor: 'rgba(0, 123, 255, 0.5)', // Set the bar color
                    borderColor: 'rgba(0, 123, 255, 1)', // Set the border color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>



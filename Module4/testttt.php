<!DOCTYPE html>
<html>
<head>
    <title>Bar Chart Example</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        // Fetch data from the database using PHP
        <?php
       


        define("DATABASE_HOST", "localhost");
define("DATABASE_USER", "root");

        // Create a connection
        $connection = mysqli_connect($hostname, $username, $password, $database);

        // Check if the connection was successful
        if (!$connection) {
            die('Database connection failed: ' . mysqli_connect_error());
        }

        // Query to retrieve data from the database
        $query = "SELECT category, value FROM chart_data";
        $result = mysqli_query($connection, $query);

        // Check if the query was successful
        if (!$result) {
            die('Error executing the query: ' . mysqli_error($connection));
        }

        // Create arrays to store the data
        $categories = [];
        $values = [];

        // Fetch data from the result set
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row['category'];
            $values[] = $row['value'];
        }

        // Close the database connection
        mysqli_close($connection);
        ?>

        // Use the fetched data to generate the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($categories); ?>,
                datasets: [{
                    label: 'Chart Data',
                    data: <?php echo json_encode($values); ?>,
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <h1>hello </h1>
</body>
</html>

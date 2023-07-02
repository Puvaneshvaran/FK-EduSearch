<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kss3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Calculate total posts and likes by month
$query = "SELECT SUBSTRING_INDEX(date, '-', -2) AS month, COUNT(*) AS post_count, SUM(likes) AS like_count FROM posts GROUP BY month";
$result = $conn->query($query);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post and Like Analysis</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="calc_rep.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        #container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<header>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-beige">
                <a class="navbar-brand" href="#">
            <!--    <img src="User_Module/img/LogoProjWE.png" alt="FK-EduSearch" class="navbar-brand logo"> &nbsp; -->
                    FK-EduSearch
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-black" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="user_page.php">User Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="dis_board.php">Discussion Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-black" href="calc_rep.php">Calculation & Report</a>
                        </li>
                        <li class="nav-item">
                    <a class="nav-link text-black" href="/compiled_MODULE-1/logout.php">Logout</a>
                     </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div id="container">
        <div id="postLikeTable">
            <h2>Post and Like Analysis</h2>
            <h3>Post Data</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total Posts</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['post_count']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <h3>Like Data</h3>
            <table border="1">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Total Likes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?php echo $row['month']; ?></td>
                            <td><?php echo $row['like_count']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

         <div id="chartsContainer">
          <div>
            <h2>Line Chart - Total Posts</h2>
            <canvas id="postChart"></canvas>
        </div>
                      <br>
        <div>
            <h2>Line Chart - Total Likes</h2>
            <canvas id="likesChart"></canvas>
        </div>
    </div>

    <script>
        var monthYear = [];
        var postCounts = [];
        var likeCounts = [];

        <?php foreach ($data as $row) { ?>
            monthYear.push('<?php echo $row['month']; ?>');
            postCounts.push(<?php echo $row['post_count']; ?>);
            likeCounts.push(<?php echo $row['like_count']; ?>);
        <?php } ?>

        // Create a line chart for total posts
            var postChartCtx = document.getElementById('postChart').getContext('2d');
            var postChart = new Chart(postChartCtx, {
            type: 'line',
            data: {
                labels: monthYear,
                datasets: [{
                    label: 'Total Posts',
                    data: postCounts,
                    borderColor: 'rgb(75, 192, 192)',
                    fill: false
                }]
            }
        });

        // Create a line chart for total likes
          var likesChartCtx = document.getElementById('likesChart').getContext('2d');
          var likesChart = new Chart(likesChartCtx, {
            type: 'line',
            data: {
                labels: monthYear,
                datasets: [{
                    label: 'Total Likes',
                    data: likeCounts,
                    borderColor: 'rgb(255, 99, 132)',
                    fill: false
                }]
            }
        });
    </script>

     <div class="container text-center">
    <br>
    <br>
    <br>
    <button class="btn btn-primary" onclick="redirectDashboard()">Back</button>
      </div>
      
    <script>
        function redirectDashboard() {
            window.location.href = "dashboard.php";
        }
    </script>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
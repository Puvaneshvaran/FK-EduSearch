<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kss3";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Get the post ID from the query string
    $post_id = $_GET["post_id"];

    // Fetch the comments for the post from the database
    $commentsSql = "SELECT * FROM comments WHERE post_id = $post_id";
    $commentsResult = $conn->query($commentsSql);

    // Generate the HTML content for comments
    if ($commentsResult->num_rows > 0) {
        while ($commentRow = $commentsResult->fetch_assoc()) {
            $commentContent = $commentRow["content"];
            echo '<p>' . $commentContent . '</p>';
        }
    } else {
        echo '<p>No comments found.</p>';
    }
}

// Close the database connection
$conn->close();
?>

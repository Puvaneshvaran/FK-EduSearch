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

// Check if the post ID is provided
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Delete the post from the database
    $sql = "DELETE FROM post WHERE id = $post_id";
    if ($conn->query($sql) === TRUE) {
        echo "Post deleted successfully.";
        echo '<script>';
        echo 'setTimeout(function() { window.location.href = "dis_board.php"; }, 2000);'; // Redirect after 2 seconds
        echo '</script>';
    } else {
        echo "Error deleting post: " . $conn->error;
        echo '<a href="dis_board.php">Go back to Discussion</a>';
    }
} else {
    echo "Invalid post ID.";
    echo '<a href="dis_board.php">Go back to Discussion</a>';
}

// Close the database connection
$conn->close();
?>

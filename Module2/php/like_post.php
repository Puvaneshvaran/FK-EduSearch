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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post ID from the request
$post_id = $_POST["postId"];

// Update the likes count in the database
$updateSql = "UPDATE posts SET likes = likes + 1 WHERE post_id = $post_id";
if ($conn->query($updateSql) === TRUE) {

    // Fetch the updated likes count
    $likesCountSql = "SELECT likes FROM posts WHERE post_id = $post_id";
    $likesCountResult = $conn->query($likesCountSql);
    if ($likesCountResult->num_rows > 0) {
        $row = $likesCountResult->fetch_assoc();
        $likesCount = $row["likes"];
        
        // Return the updated likes count as a JSON response
        echo json_encode(array("success" => true, "likesCount" => $likesCount));
    } else {
        echo json_encode(array("success" => false, "message" => "Failed to fetch likes count."));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Failed to update likes count."));
}
}
// Close the database connection
$conn->close();
?>
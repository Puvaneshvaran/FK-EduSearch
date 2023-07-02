<?php
// Retrieve post data from the form
$title = $_POST['postTitle'];
$category = $_POST['postCategory'];
$content = $_POST['postContent'];

// Create a database connection
$conn = new mysqli('localhost', 'root', '', 'kss3');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query to insert the post into the database
$stmt = $conn->prepare("INSERT INTO posts (title, category, content) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $title, $category, $content);
$stmt->execute();

// Close the database connection
$stmt->close();
$conn->close();

// Redirect back to the discussion page
header("Location: dis_board.php");
exit();
?>

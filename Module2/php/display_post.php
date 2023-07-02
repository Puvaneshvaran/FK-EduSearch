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

// Fetch the posts from the database
$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

// Generate the HTML content for posts
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $post_id = $row["post_id"];
        $postTitle = $row["title"];
        $postCategory = $row["category"];
        $postContent = $row["content"];
        $likesCount = $row["likes"];

        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $postTitle . '</h5>';
        echo '<p class="card-text">Category: ' . $postCategory . '</p>';
        echo '<p class="card-text">' . $postContent . '</p>';
        echo '<p class="card-text likes-count-' . $post_id . '">Likes: ' . $likesCount . '</p>'; // Display the likes count
        // Add an Edit button 
        echo '<a href="edit_post.php?id=' . $post_id . '" class="btn btn-primary" style="margin-right:5px;">Edit</a>';
        // Add a Delete button 
        echo '<a href="delete_post.php?id=' . $post_id . '" class="btn btn-danger">Delete</a>';
        echo '<br>';
        // Add a Like button
        echo '<button type="button" class="btn btn-link like-btn" data-post_id="' . $post_id . '">Like</button>';

        // Add a Comment button
        echo '<button type="button" class="btn btn-link comment-btn" data-post_id="' . $post_id . '">Comment</button>';

        echo '<div class="comments-container">';
        // Fetch comments for the post from the database
        $commentsSql = "SELECT * FROM comment WHERE post_id = $post_id";
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

        echo '</div>'; // Close comments

        echo '</div></div><br>';
    }
        echo '<div class="card-footer">';
        echo '</div></div></div>';
    }
 else {
    echo "No posts found.";
}

// Close the database connection
$conn->close();
?>
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

// Check if the post ID is provided in the query parameter
if (isset($_GET['id'])) {
    $post_id = $_GET['post_id'];

    // Fetch the post from the database based on the provided ID
    $sql = "SELECT * FROM post   WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $post_id = $row["id"];
        $postTitle = $row["title"];
        $postCategory = $row["category"];
        $postContent = $row["content"];

        // Display the edit form with pre-filled values
        echo '
        <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>FK-EduSearch</title>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
                <link rel="stylesheet" href="styles.css">
            </head>
            <body>
               
                <section class="container mt-4">
                <div class="mt-4" id="postContainer">
                    <h4>Posts</h4>
                    <form action="update_post.php" method="POST">
                        <input type="hidden" name="post_id" value="' . $post_id . '">
                        <div class="form-group">
                            <label for="editPostTitle">Title</label>
                            <input type="text" name="editPostTitle" class="form-control" id="editPostTitle" value="' . $postTitle . '" required>
                        </div>
                        <div class="form-group">
                            <label for="editPostCategory">Category</label>
                            <select class="form-control" name="editPostCategory" id="editPostCategory" required>
                                <option value="">Select category</option>
                                <option value="research" ' . ($postCategory == 'research' ? 'selected' : '') . '>Research</option>
                                <option value="course" ' . ($postCategory == 'course' ? 'selected' : '') . '>Course</option>
                                <option value="other" ' . ($postCategory == 'other' ? 'selected' : '') . '>Other</option>
                                <!-- Add more category options as needed -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editPostContent">Content</label>
                            <textarea class="form-control" name="editPostContent" id="editPostContent" rows="5" required>' . $postContent . '</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                </section>
        ';
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>

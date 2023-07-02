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

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the post ID and comment content from the form data
    $post_id = $_POST["post_id"];
    $commentContent = $_POST["commentContent"];

    // Insert the comment into the database
    $insertSql = "INSERT INTO comments (post_id, content) VALUES ('$post_id', '$commentContent')";
    if ($conn->query($insertSql) === TRUE) {
        echo "Comment added successfully.";
    } else {
        echo "Error: " . $insertSql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Add Comment</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Add Comment</h2>
                <div class="comment-form">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="commentContent">Comment</label>
                            <textarea class="form-control" id="commentContent" name="commentContent" rows="3"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="post_id" value="<?php echo $_GET['post_id']; ?>">
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

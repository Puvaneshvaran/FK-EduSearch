<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-beige">
                <a class="navbar-brand" href="#">
                    FK-EduSearch
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active text-black" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="user_page.php">User Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="dis_board.php">Discussion Board</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="calc_rep.php">Calculation & Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-black" href="/compiled_MODULE-1/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <br>
    <div class="container">
        <form action="" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search by keyword">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
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

        // Search functionality
        $keyword = $_GET['keyword'] ?? '';

        // Sort functionality
        $sort = $_GET['sort'] ?? '';

        // Fetch the posts from the database
        $sql = "SELECT * FROM posts WHERE title LIKE '%$keyword%'";
        if ($sort == 'category') {
            $sql .= " ORDER BY category ASC";
        } elseif ($sort == 'likes') {
            $sql .= " ORDER BY likes DESC";
        } else {
            $sql .= " ORDER BY post_id DESC";
        }
        $result = $conn->query($sql);

        // Generate the HTML content for posts
        if ($result->num_rows > 0) {
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Title</th>';
            echo '<th>Category <a href="?sort=category">&#x2195;</a></th>';
            echo '<th>Content</th>';
            echo '<th>Likes <a href="?sort=likes">&#x2195;</a></th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                $postId = $row["post_id"];
                $postTitle = $row["title"];
                $postCategory = $row["category"];
                $postContent = $row["content"];
                $likesCount = $row["likes"];

                echo '<tr>';
                echo '<td><h4>' . $postTitle . '</h4></td>';
                echo '<td><strong>Category:</strong> ' . $postCategory . '</td>';
                echo '<td><p>' . nl2br($postContent) . '</p></td>';
                echo '<td><strong>Likes:</strong> ' . $likesCount . '</td>';
                echo '<td>';
                // Add a Like button
                echo '<button type="button" class="btn btn-link like-btn" data-postid="' . $postId . '">Like</button>';

                // Add a Comment button
                echo '<button type="button" class="btn btn-link comment-btn" data-postid="' . $postId . '">Comment</button>';

                // Add a Reply button
                echo '<button type="button" class="btn btn-link reply-btn" data-postid="' . $postId . '">Reply</button>';

                echo '<div class="comments-container">';
                // Fetch comments for the post from the database
                $commentsSql = "SELECT * FROM comment WHERE post_id = $postId";
                $commentsResult = $conn->query($commentsSql);

                // Generate the HTML content for comments
                if ($commentsResult->num_rows > 0) {
                    echo '<strong>Comments:</strong>';
                    while ($commentRow = $commentsResult->fetch_assoc()) {
                        $commentContent = $commentRow["comment"];
                        echo '<p>' . nl2br($commentContent) . '</p>';
                    }
                } else {
                    echo '<p>No comments found.</p>';
                }

                echo '</div>';

                echo '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No posts found.";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
    <br>
    <br>
    <!-- Back button -->
    <div class="container d-flex justify-content-center">
        <button type="button" onclick="window.location.href='dis_board.php'" class="btn btn-primary">Back</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.like-btn').click(function () {
                var postId = $(this).data('postid');
                alert('Liked post ID: ' + postId);
            });

            $('.comment-btn').click(function () {
                var postId = $(this).data('postid');
                var commentsContainer = $(this).siblings('.comments-container');
                // Toggle the visibility of comments for the clicked post
                commentsContainer.toggle();
            });
        });
    </script>
</body>
</html>

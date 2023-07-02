<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="home.css">

  <script src="home.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

  <script>
    function redirectToPage1() {
      window.location.href = "../PUVA/calendar_view/index.php";
    }
  </script>

  <title>FK-EduSearch</title>

</head>

<body>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg bg-beige">
        <a class="navbar-brand" href="#">
          <!--      <img src="User_Module/img/LogoProjWE.png" alt="FK-EduSearch" class="logo"> --> &nbsp; FK-EduSearch
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
              <a class="nav-link active text-black" href="dis_board.php">Discussion Board</a>
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

  <section class="container mt-4">
    <h2>Discussion Board</h2>
    <form id="postForm" action="add_post.php" method="POST">
      <div class="form-group">
        <label for="postTitle">Title</label>
        <input type="text" name="postTitle" class="form-control" id="postTitle" placeholder="Enter post title" required>
      </div>
      <div class="form-group">
        <label for="postCategory">Category</label>
        <select class="form-control" name="postCategory" id="postCategory" required>
          <option value="">Select category</option>
          <option value="research">Research</option>
          <option value="course">Course</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="postContent">Content</label>
        <textarea class="form-control" name="postContent" id="postContent" rows="5" placeholder="Enter post content"
          required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a class="btn btn-primary" href="/compiled_MODULE-1/PUVA/calendar_view/index.php">Schedule Posting</a>
      <a class="btn btn-primary" href="/compiled_MODULE-1/Module4/createuser.php">Report</a>
      <a class="btn btn-primary" href="/compiled_MODULE-1/Module4/ComplaintFeedback/index.php">Complain</a>
    </form>
    <hr>
    <div class="mt-4" id="postContainer">
      <h4>Posts</h4>

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
      $sql = "SELECT * FROM posts ORDER BY post_id DESC"; 
      $result = $conn->query($sql);

      // Generate the HTML content for posts
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $post_id = $row["post_id"];
          $postTitle = $row["title"];
          $postCategory = $row["category"];
          $postContent = $row["content"];
          $likesCount = $row["likes"];
          ?>

          <div class="card mb-4">
      <div class="card-header">
        <h5 class="card-title"><?php echo $postTitle; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Category: <?php echo $postCategory; ?></h6>
      </div>
      <div class="card-body">
        <p class="card-text"><?php echo $postContent; ?></p>
      </div>
      <div class="card-footer">
        <span class="likes-count-<?php echo $post_id; ?>">Likes: <?php echo $likesCount; ?></span>
        <button class="btn btn-sm btn-primary like-btn" data-postid="<?php echo $post_id; ?>">
            Like
        </button>
        <button class="btn btn-sm btn-primary comment-btn" data-postid="<?php echo $post_id; ?>">
          Comments
        </button>
        <div class="comments-container"></div>
      </div>
    </div>

        <?php
      }
    }
    // Calculate the total number of posts
    $totalPosts = $result->num_rows;

    // Close the database connection
    $conn->close();
    ?>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"
    integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

  <script>
    // Use AJAX to load the posts dynamically
    window.addEventListener('DOMContentLoaded', function () {
      var postContainer = document.getElementById('postContainer');
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'fetch_posts.php', true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          postContainer.innerHTML = xhr.responseText;
          addLikeEventListeners(); // Add event listeners for Like buttons
          addCommentEventListeners(); // Add event listeners for Comment buttons
        }
      };
      xhr.send();
    });

    // Function to add event listeners for Like buttons
    function addLikeEventListeners() {
      var likeButtons = document.getElementsByClassName('like-btn');
      Array.prototype.forEach.call(likeButtons, function (button) {
        button.addEventListener('click', function () {
          var postId = this.getAttribute('data-postid');
          likePost(postId);
        });
      });
    }

    // Function to handle the like functionality
    function likePost(postId) {
      var likeCountElement = document.querySelector('.likes-count-' + postId);
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'like_post.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
            likeCountElement.innerHTML = 'Likes: ' + response.likesCount;
          } else {
            console.log(response.message);
          }
        }
      };
      xhr.send('postId=' + postId);
    }

    // Function to add event listeners for Comment buttons
    function addCommentEventListeners() {
      var commentButtons = document.getElementsByClassName('comment-btn');
      Array.prototype.forEach.call(commentButtons, function (button) {
        button.addEventListener('click', function () {
          var postId = this.getAttribute('data-postid');
          var commentsContainer = this.parentNode.querySelector('.comments-container');
          fetchComments(postId, commentsContainer);
        });
      });
    }

    // Function to fetch comments for a post
    function fetchComments(postId, commentsContainer) {
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'fetch_comments.php?postId=' + postId, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
          commentsContainer.innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }
  </script>
</body>

</html>
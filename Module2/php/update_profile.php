<?php
// PHP code to update user profile in the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "kss3";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user submitted the form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $username = $_POST['username'];

    // Retrieve the user profile from the database based on the provided username
    $selectQuery = "SELECT * FROM user_profile WHERE username = '$username'";
    $result = mysqli_query($conn, $selectQuery);
    $profile = mysqli_fetch_assoc($result);

    if ($profile) {
        // Display the user profile form with the retrieved data
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" href="home.css">
            <script src="home.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.14.7/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                                    <a class="nav-link active text-black" href="user_page.php">User Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="dis_board.php">Discussion Board</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="calc_rep.php">Calculation & Report</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h2 class="text-center mb-4">Update User Profile</h2>
                        <div class="profile-form">
                            <form method="POST" action="update_profile.php">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $profile['username']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $profile['email']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $profile['phone']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="Course">Course</label>
                                    <select class="form-control" id="Course" name="Course" required>
                                        <option value="select">-Please select-</option>
                                        <option value="Diploma" <?php echo ($profile['course'] == 'Diploma') ? 'selected' : ''; ?>>Diploma in Computer Science</option>
                                        <option value="Undergraduate" <?php echo ($profile['course'] == 'Undergraduate') ? 'selected' : ''; ?>>Bachelor of Computer Science (Software Engineering) with Honours</option>
                                        <option value="Undergraduate" <?php echo ($profile['course'] == 'Undergraduate') ? 'selected' : ''; ?>>Bachelor of Computer Science (Computer Systems & Networking) with Honours</option>
                                        <option value="Undergraduate" <?php echo ($profile['course'] == 'Undergraduate') ? 'selected' : ''; ?>>Bachelor of Computer Science (Graphics & Multimedia Technology) with Honours</option>
                                        <option value="Undergraduate" <?php echo ($profile['course'] == 'Undergraduate') ? 'selected' : ''; ?>>Bachelor of Computer Science (Cyber Security) with Honours</option>
                                        <option value="Postgraduate" <?php echo ($profile['course'] == 'Postgraduate') ? 'selected' : ''; ?>>Master of Science (Information & Communication Technology)</option>
                                        <option value="Postgraduate" <?php echo ($profile['course'] == 'Postgraduate') ? 'selected' : ''; ?>>Master of Science (Software Engineering)</option>
                                        <option value="Postgraduate" <?php echo ($profile['course'] == 'Postgraduate') ? 'selected' : ''; ?>>Master of Science (Computer Networking)</option>
                                        <option value="Postgraduate" <?php echo ($profile['course'] == 'Postgraduate') ? 'selected' : ''; ?>>Research Programmes (PhD & MSc in Computer Science)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="research_area">Research Area</label>
                                    <input type="text" class="form-control" id="research" name="research" value="<?php echo $profile['research']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="academic_status">Academic Status</label>
                                    <select class="form-control" id="academic_status" name="academic_status" required>
                                        <option value="select">-Please select-</option>
                                        <option value="Undergraduate" <?php echo ($profile['academic_status'] == 'Undergraduate') ? 'selected' : ''; ?>>Undergraduate</option>
                                        <option value="Postgraduate" <?php echo ($profile['academic_status'] == 'Postgraduate') ? 'selected' : ''; ?>>Postgraduate</option>
                                        <option value="Postponed" <?php echo ($profile['academic_status'] == 'Postponed') ? 'selected' : ''; ?>>On hold</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="update" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </body>

        </html>
        <?php
    } else {
        echo "User profile not found.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['Course'];
    $research = $_POST['research'];
    $academicStatus = $_POST['academic_status'];

    // Update the user profile in the database
    $updateQuery = "UPDATE user_profile SET email = '$email', phone = '$phone', course = '$course', research = '$research', academic_status = '$academicStatus' WHERE username = '$username'";
    if (mysqli_query($conn, $updateQuery)) {
        echo "User profile updated successfully.";
    } else {
        echo "Error updating user profile: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
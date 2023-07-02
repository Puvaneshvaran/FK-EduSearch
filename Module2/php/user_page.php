<?php
// PHP code to fetch user profile from the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "kss3";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert or Update user profile in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save'])) { 
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = isset($_POST['phone']) ? $_POST['phone'] : ""; 
        $course = $_POST['Course'];
        $research = isset($_POST['research']) ? $_POST['research'] : ""; 
        $academic_status = $_POST['academic_status'];

        // Insert user profile into the database
        $insertQuery = "INSERT INTO user_profile (username, email, phone, course, research, academic_status) VALUES ('$username', '$email', '$phone', '$course', '$research', '$academic_status')";
        if (mysqli_query($conn, $insertQuery)) {
            // Redirect to the current page to clear the form fields
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        }
    } elseif (isset($_POST['update'])) { 
        
        header("Location: update_profile.php");
        exit();
    } elseif (isset($_POST['clear'])) { 
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
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
                        <li class="nav-item">
                    <a class="nav-link text-black" href="/compiled_MODULE-1/logout.php">Logout</a>
                     </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">User Profile</h2>
                <div class="profile-form">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="Course">Course</label>
                            <select class="form-control" id="Course" name="Course" required>
                                <option value="select">-Please select-</option>
                                <option value="Diploma">Diploma in Computer Science</option>
                                <option value="Undergraduate">Bachelor of Computer Science (Software Engineering) with
                                    Honours</option>
                                <option value="Undergraduate">Bachelor of Computer Science (Computer Systems & Networking)
                                    with
                                    Honours</option>
                                <option value="Undergraduate">Bachelor of Computer Science (Graphics & Multimedia
                                    Technology) with
                                    Honours</option>
                                <option value="Undergraduate">Bachelor of Computer Science (Cyber Security) with Honours
                                </option>
                                <option value="Postgraduate">Master of Science (Information & Communication
                                    Technology)</option>
                                <option value="Postgraduate">Master of Science (Software Engineering)</option>
                                <option value="Postgraduate">Master of Science (Computer Networking)</option>
                                <option value="Postgraduate">Research Programmes (PhD & MSc in Computer Science)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="research_area">Research Area</label>
                            <input type="text" class="form-control" id="research" name="research" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="academic_status">Academic Status</label>
                            <select class="form-control" id="academic_status" name="academic_status" required>
                                <option value="select">-Please select-</option>
                                <option value="Undergraduate">Undergraduate</option>
                                <option value="Postgraduate">Postgraduate</option>
                                <option value="Postponed">On hold</option>
                            </select>
                        </div>
        <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary">Update</button>
        <button type="submit" name="save" class="btn btn-primary">Save</button>
        <button type="submit" name="clear" class="btn btn-danger">Clear</button>
        </div>
        </form>
         </div>
        </div>
    </div>

    <script>
       <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save']) && mysqli_query($conn, $insertQuery)): ?>
        // Show the window alert when the form is submitted successfully
        window.addEventListener('DOMContentLoaded', function () {
            alert("User Profile Saved Successfully.");
        });
        <?php endif; 
        ?>

        // Function to populate form fields with existing user profile data
        function populateForm() {
            <?php if ($profile): ?>
            document.getElementById('username').value = '<?php echo $profile['username']; ?>';
            document.getElementById('email').value = '<?php echo $profile['email']; ?>';
            document.getElementById('phone').value = '<?php echo $profile['phone']; ?>';
            document.getElementById('Course').value = '<?php echo $profile['course']; ?>';
            document.getElementById('research').value = '<?php echo $profile['research']; ?>';
            document.getElementById('academic_status').value = '<?php echo $profile['academic_status']; ?>';
            <?php endif; ?>
        }
        </script>
</body>

</html>
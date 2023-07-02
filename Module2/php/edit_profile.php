<?php
// PHP code to fetch user profile from the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "fk-edusearch";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch user profile from the database
$selectQuery = "SELECT * FROM user_profile";
$result = mysqli_query($conn, $selectQuery);
$row = mysqli_fetch_assoc($result);

// Update user profile in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $course = $_POST['course'];
    $research_area = $_POST['research_area'];
    $academic_status = $_POST['academic_status'];

    // Update user profile in the database
    $updateQuery = "UPDATE user_profile SET full_name='$full_name', email='$email', phone_number='$phone_number', course='$course', research_area='$research_area', academic_status='$academic_status'";
    mysqli_query($conn, $updateQuery);

    // Redirect back to user_page.php after updating the profile
    header("Location: user_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Profile</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Edit Profile</h2>
                <div class="profile-form">
                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="<?php echo $row['full_name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number"
                                value="<?php echo $row['phone_number']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <select class="form-control" id="course" name="course" required>
                                <option value="select">-Please select-</option>
                                <!-- Add your course options here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="research_area">Research Area</label>
                            <input type="text" class="form-control" id="research_area" name="research_area"
                                value="<?php echo $row['research_area']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="academic_status">Academic Status</label>
                            <select class="form-control" id="academic_status" name="academic_status" required>
                                <option value="select">-Please select-</option>
                                <!-- Add your academic status options here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

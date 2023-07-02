<?php
include('assets/config/dbcon.php');

if (isset($_POST["Submit"])) {
    // Retrieve user input from the form
    $uname = $_POST["uname"];
    $email = $_POST["email"];
    $u_role = $_POST["u_role"];
    $plain_password = $_POST["pass"];

    if ($u_role == "1" || $u_role == "2"|| $u_role == "3") {
        // Hash the password
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

        // Get the current date
        $current_date = date('m-d-Y');

        // Prepare the SQL statement
        $insert = mysqli_query($conn, "INSERT INTO user (username, email, role, password, date)
        VALUES ('$uname', '$email', '$u_role', '$hashed_password', '$current_date')");

        if ($insert) {
            echo "<script>alert('Your Registration has been created successfully');</script>";
            header('Location: Login.php');
        } else {
            echo "<script>alert('Error: " . $insert . "\\n" . $conn->error . "');</script>";
        }
    }

    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Knowledge Sharing System (FK-EduSearch)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style2.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .register-form {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .register-heading {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body class="login_page" style="background-image:url('https://www.pngmart.com/files/13/Pattern-Transparent-Background.png');">
    <div class="container">
  
            <style>
                .container {
                display: flex;
                justify-content: center;
                align-items: center;
                }

  

.logo {
  position: absolute;
  top: 0;
  right: 0;
}

                
            </style>

        <div class="register-form">
            <div class="row">
                <div class="col-md-12">
                    <img src="assets/img/logo.png" alt="logo" />
                    </div>
                    
                  
               
            </div>
            <div class="row register-form">
                <div class="col-md-12">
                    <h3 class="register-heading">New Member</h3>
                    <form method="POST" action="" onsubmit="return checkPassword() && validateForm();">
                        <div class="form-group">
                            <label for="uname">Name:</label>
                            <input type="text" class="form-control" name="uname" id="uname" placeholder="Name" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email ID:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email ID" />
                        </div>
                        <div class="form-group">
                            <label for="u_role">Role:</label>
                            <select class="form-control" name="u_role" id="u_role">
                                <option class="hidden" selected disabled>Please select your Role</option>
                                <option value="1">Staff</option>
                                <option value="2">Expert</option>
                                <option value="3">Student</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pass">Password:</label>
                            <input type="password" minlength="6" name="pass" class="form-control" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="Confirm_Password">Confirm Password:</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" id="Confirm_Password" />
                            <small id="passwordMismatch" style="color: red; display: none;">Your Passwords do not match!</small>
                        </div>
                        <div class="mt-3 form_btn">
                

                    
                    <input type="Submit" id="registerBtn" class="btnRegister btn btn-warning" value="Register" name="Submit" />
                        </div>
                    </form>
                    <div class="text-center">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>









<script>
        // Function to check if passwords match
        function checkPassword() {
            var user_password = document.getElementById("pass").value;
            var confirmPassword = document.getElementById("Confirm_Password").value;

            if (user_password !== confirmPassword) {
                document.getElementById("passwordMismatch").style.display = "block";
                return false;
            } else {
                document.getElementById("passwordMismatch").style.display = "none";
                return true;
            }
        }

    function validateForm() {
    var uname = document.getElementById("uname").value.trim();
    var email = document.getElementById("email").value.trim();
    var db_pass = document.getElementById("pass").value.trim();
    var u_role = document.getElementById("u_role").value;

    

    // Check if any required fields are empty
    if (
        uname === "" ||
        email === "" ||
        db_pass === "" ||
        u_role === ""
       ) 
    {
        document.getElementById("error_message").innerText = "Please fill in all the fields.";
        return false; // Prevent form submission
    } else {
        document.getElementById("error_message").innerText = ""; // Clear the error message
    }

    // Validate email format using regular expression
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById("error_message").innerText = "Please enter a valid email address.";
        return false; // Prevent form submission
    } else {
        document.getElementById("error_message").innerText = ""; // Clear the error message
    }


    // Add any additional validation checks based on your requirements

    return true; // Proceed with form submission
}
</script>
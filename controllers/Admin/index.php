<?php
session_start();
// if(isset($_SESSION['token'])){
//     header("Location: ./../Instructors/dashboard.php");
//     exit;
// }
require './../database/config.php';
require './../partials/head.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Management System - Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div class="container">
        <h1>Student Information Management System</h1>
        <div class="user-selection">
            <label for="user-type">Select User Type:</label>
            <select id="user-type" onchange="showLoginForm()">
                <option value="" disabled selected>Select</option>
                <option value="admin">Admin</option>
                <option value="instructor">Instructor</option>
            </select>
        </div>

        <!-- Admin Login Form -->
        <form id="admin-login" class="login-form" style="display: none;">
            <h2>Admin Login</h2>
            <label for="admin-username">Admin Username:</label>
            <input type="text" id="admin-username" name="admin-username" placeholder="Enter Admin Username" required>
            <label for="admin-password">Password:</label>
            <input type="password" name="admin-password" id="admin-password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- Instructor Login Form -->
        <form id="instructor-login" class="login-form" style="display: none;">
            <h2>Instructor Login</h2>
            <label for="instructor-id">Instructor ID:</label>
            <input type="text" id="instructor-id" name="instructor-id" placeholder="Enter Instructor ID" required>
            <label for="instructor-password">Password:</label>
            <input type="password" id="instructor-password" name="instructor-password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

        // Toggle the login form visibility based on user type
        function showLoginForm() {
            // Hide both login forms initially
            document.getElementById('admin-login').style.display = 'none';
            document.getElementById('instructor-login').style.display = 'none';

            const userType = document.getElementById('user-type').value;

            // Show the selected login form
            if (userType === 'admin') {
                document.getElementById('admin-login').style.display = 'block';
            } else if (userType === 'instructor') {
                document.getElementById('instructor-login').style.display = 'block';
            }
        }

        $(document).ready(function (){
            // Handle Admin Login Form Submission
            $('#admin-login').on('submit', function(e){

                e.preventDefault(); // Prevent default form submission
                let formData = $(this).serialize(); // Serialize form data
                
                $.ajax({
                    type: "POST",
                    url: 'action.php',
                    data: { userType: 'admin', formData: formData }, // Send user type and form data
                    success: function(response) {
                        // Check the response to see if it's a valid JSON
                        console.log(response.isSuccess);  // Log the full response

                        // Check if response has 'success' key
                        if (response && response.isSuccess !== undefined) {
                            if (response.isSuccess) {
                                // Handle successful login (e.g., redirect or display success message)
                                console.log(response.message);
                                window.location.href = 'admindashboard.php'; // Redirect after successful login
                            } else {
                                // Handle failed login (e.g., display error message)
                                console.error(response.message);
                                alert(response.message); // Display error message from the PHP response
                            }
                        } else {
                            console.error("Unexpected response format:", response);
                            alert("Something went wrong. Please try again.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error); // Handle any errors from the AJAX request
                    }
                });

            });

            // Handle Instructor Login Form Submission
            $('#instructor-login').on('submit', function(e){
                e.preventDefault(); // Prevent default form submission
                let formData = $(this).serialize(); // Serialize form data
                $.ajax({
                    type: "POST",
                    url: 'action.php',
                    data: { userType: 'instructor', formData: formData }, // Send user type and form data
                    success: function(response) {
                        console.log(response); 
                        window.location.href = 'admindashboard.php';
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error); // Handle errors if any
                    }
                });
            });
        });

    </script>
</body>
</html>

<?php

    require 'config/config.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Management System - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/admin-login.css">
   
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
        <div>
            <p class="p-2 text-secondary">Back to home page <a href="/home">here</a>.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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

                e.preventDefault(); 
                let formData = $(this).serialize(); 
                
                $.ajax({
                    type: "POST",
                    url: '/admin-login-action',
                    data: { userType: 'admin', formData: formData }, 
                    success: function(response) {
                        console.log(response.isSuccess); 

                      
                        if (response && response.isSuccess !== undefined) {
                            if (response.isSuccess) {
                               
                                console.log(response.message);
                                window.location.href = '/admindashboard';
                            } else {
                                // Handle failed login (e.g., display error message)
                                console.error(response.message);
                                alert(response.message); 
                            }
                        } else {
                            console.error("Unexpected response format:", response);
                            alert("Something went wrong. Please try again.");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error); 
                    }
                });

            });

            // Handle Instructor Login Form Submission
            $('#instructor-login').on('submit', function(e){
                e.preventDefault(); 
                let formData = $(this).serialize(); 
                $.ajax({
                    type: "POST",
                    url: '/admin-login-action',
                    data: { userType: 'instructor', formData: formData },
                    success: function(response) {
                        console.log(response); 
                        window.location.href = '/admindashboard';
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                    }
                });
            });
        });

    </script>
</body>
</html>

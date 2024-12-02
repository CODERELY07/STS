<?php
// This script handles the process of account creation for both students and instructors, including form handling, validation, and database interactions.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$login = true;
require_once '../config/config.php';
require_once '../views/partials/head.php';
require_once '../views/partials/register-header.php';

function createAccount($id, $token, $username, $password, $type) {
    global $pdo;
    $username = htmlspecialchars(trim($username), ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars(trim($password), ENT_QUOTES, 'UTF-8');
    // Check if the username or password is empty
    if (empty($username) || empty($password)) {
        echo "<p class='mt-4 text-center color-main text-uppercase'>Username and password are required.</p>";
        return;
    }
    if (strlen($password) < 6) {
       echo "<p class='mt-4 text-center color-main text-uppercase'>Password must be at least 6 characters</p>";
       return;
    }
    // Check for duplicate username
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $usernameCount = $stmt->fetchColumn();

    if ($usernameCount > 0) {
        echo "<p class='mt-4 text-center color-main text-uppercase'>Username is already taken. Please choose another one.</p>";
        return;
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $status = "enrolled"; 

    try {
        // Set role based on user type (student or instructor)
        if ($type == 'student') {
            $stmt = $pdo->prepare("SELECT email FROM students WHERE id = :id AND token = :token");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':token', $token);
            $role = 'student';  // Set role for student
        } else {
            $stmt = $pdo->prepare("SELECT email FROM instructors WHERE InstructorID = :id AND token = :token");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':token', $token);
            $role = 'instructor';  // Set role for instructor
        }
        $stmt->execute();

        // If no records match, return invalid token or user ID
        if ($stmt->rowCount() === 0) {
            echo "<p class='mt-4 text-center color-main text-uppercase'>Invalid token or user ID.</p>";
            return;
        }

        // Insert new user into 'users' table
        $stmt = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (:username, :password, :role)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();

        $userID = $pdo->lastInsertId();

        // Update students or instructors table with userID
        if ($type == 'student') {
            $stmt = $pdo->prepare("UPDATE students SET userID = :userID, status = :status, token = NULL WHERE id = :id");
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);
            $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        } else {
            $stmt = $pdo->prepare("UPDATE instructors SET userID = :userID, token = NULL WHERE InstructorID = :id");
            $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }

        $stmt->execute();
        echo "<p class='mt-4 text-center color-main text-uppercase'>Account successfully created!</p>"; 
        echo "<p class='mt-2 text-center'>Redirecting to login, please wait...</p>";

        // Redirect user based on type (student or instructor)
        if ($type == 'student') {
            echo "
            <script>
            setTimeout(function() {
                window.location.href = '/login';  
            }, 5000);
            </script>";
        } else {
            echo "
            <script>
            setTimeout(function() {
                window.location.href = '/adminLogin';  
            }, 5000);
            </script>";
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

// Handle GET request for student registration
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'], $_GET['token'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];

    // Validate request
    if (!is_numeric($id) || empty($token)) {
        echo "Invalid request.";
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT email FROM students WHERE id = :id AND token = :token");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        $user = $stmt->fetch();

        if (!$user) {
            echo "Invalid token or user ID.";
            exit;
        }

        // Display student registration form
        echo '
        <div class="container">
        <div class="row mt-5 justify-content-center">
        <div class="col-md-6 mt-5">
        <h2 class="text-center display-5">Create Your Account</h2>
        <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
            <input type="hidden" name="id" value="' . $id . '">
            <input type="hidden" name="token" value="' . $token . '">
            <div class="form-group my-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group my-3">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </form>
        </div>
        </div>
        </div>';
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

// Handle GET request for instructor registration
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['InstructorID'], $_GET['token'])) {
    $InstructorID = $_GET['InstructorID'];
    $token = $_GET['token'];

    // Validate request
    if (!is_numeric($InstructorID) || empty($token)) {
        echo "Invalid request.";
        exit;
    }

    try {
        $stmt = $pdo->prepare("SELECT email FROM instructors WHERE InstructorID = :InstructorID AND token = :token");
        $stmt->bindParam(':InstructorID', $InstructorID, PDO::PARAM_INT);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        $user = $stmt->fetch();

        if (!$user) {
            echo "Invalid token or user ID.";
            exit;
        }

        // Display instructor registration form
        echo '
        <div class="container">
        <div class="row mt-5 justify-content-center">
        <div class="col-md-6 mt-5">
        <h2 class="text-center display-5">Create Your Account</h2>
        <form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
            <input type="hidden" name="InstructorID" value="' . $InstructorID . '">
            <input type="hidden" name="token" value="' . $token . '">
            <div class="form-group my-3">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group my-3">
                <label for="password">Password:</label>
                <input class="form-control" type="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Create Account</button>
        </form>
        </div>
        </div>
        </div>';
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

// Handle POST request for student account creation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'], $_POST['id'], $_POST['token'])) {
    $id = $_POST['id'];
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $token = $_POST['token'];

    createAccount($id, $token, $username, $password, 'student');
}

// Handle POST request for instructor account creation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'], $_POST['InstructorID'], $_POST['token'])) {
    $InstructorID = $_POST['InstructorID'];
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $token = $_POST['token'];

    createAccount($InstructorID, $token, $username, $password, 'instructor');
}
?>

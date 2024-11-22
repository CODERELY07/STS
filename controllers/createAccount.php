<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../config/config.php';

function createAccount($id, $token, $username, $password, $type) {
    global $pdo;

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        return;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $status = "enrolled"; 

    try {
   
        if ($type == 'student') {
            $stmt = $pdo->prepare("SELECT email FROM students WHERE id = :id AND token = :token");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':token', $token);
        } else {
            $stmt = $pdo->prepare("SELECT email FROM instructors WHERE InstructorID = :id AND token = :token");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':token', $token);
        }
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            echo "Invalid token or user ID.";
            return;
        }

        // Insert new user into 'users' table
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        $userID = $pdo->lastInsertId();

     
        if ($type == 'student') {
            $stmt = $pdo->prepare("UPDATE students SET userID = :userID, status = :status, token = NULL WHERE id = :id");
            $stmt->bindParam(':status', $status, PDO::PARAM_STR);  // Only apply status for students
        } else {
            $stmt = $pdo->prepare("UPDATE instructors SET userID = :userID, token = NULL WHERE InstructorID = :id");
        }

        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Account successfully created!";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'], $_GET['token'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];

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

        
        echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="token" value="' . $token . '">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br>
                <button type="submit">Create Account</button>
              </form>';
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
} 

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['InstructorID'], $_GET['token'])) {
    $InstructorID = $_GET['InstructorID'];
    $token = $_GET['token'];

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

        // Form for instructor account creation
        echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="POST">
                <input type="hidden" name="InstructorID" value="' . $InstructorID . '">
                <input type="hidden" name="token" value="' . $token . '">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br>
                <button type="submit">Create Account</button>
              </form>';
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'], $_POST['id'], $_POST['token'])) {
    // Student account creation
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $_POST['token'];

    createAccount($id, $token, $username, $password, 'student');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'], $_POST['InstructorID'], $_POST['token'])) {
    // Instructor account creation
    $InstructorID = $_POST['InstructorID'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $_POST['token'];

    createAccount($InstructorID, $token, $username, $password, 'instructor');
}
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'], $_GET['token'])) {
    $id = $_GET['id'];
    $token = $_GET['token'];

    if (!is_numeric($id) || empty($token)) {
        echo "Invalid request.";
        exit;
    }

    require_once '../config/config.php';

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

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="token" value="<?php echo $token; ?>">

            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <button type="submit">Create Account</button>
        </form>
        <?php

    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'], $_POST['password'], $_POST['id'], $_POST['token'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $token = $_POST['token'];
    $status = "enrolled";
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    require_once '../config/config.php';

    try {
        $stmt = $pdo->prepare("SELECT email FROM students WHERE id = :id AND token = :token");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            echo "Invalid token or user ID.";
            exit;
        }

        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        $userID = $pdo->lastInsertId();

        $stmt = $pdo->prepare("UPDATE students SET userID = :userID, status = :status, token = NULL WHERE id = :id");
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':status', $status, PDO::PARAM_STR);  // Correct binding for status
        $stmt->execute();

        echo "Account successfully created!";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>

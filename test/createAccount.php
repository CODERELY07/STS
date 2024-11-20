<?php
session_start(); // Start a session if needed to store success/error messages

// Check if the token is present in the URL
if (isset($_GET['token'])) {
    // Get the token from the URL
    $token = $_GET['token'];

    try {
        // Database connection using PDO
        require_once '../config/config.php';

        // Query to check if the token exists in the database
        $sql = "SELECT id FROM students WHERE token = :token";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        // If no user is found with this token
        if ($stmt->rowCount() == 0) {
            $_SESSION['error'] = "Invalid or expired token.";
            header("Location: error.php"); // Redirect to an error page or show error on the same page
            exit;
        }

        // If token is valid, show the form for the user to create a password
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the form data
            $password = $_POST['password'];

            // Password validation (optional)
            if (strlen($password) < 8) {
                $_SESSION['error'] = "Password must be at least 8 characters long.";
                header("Location: createAccount.php?token=" . urlencode($token)); // Redirect back to form
                exit;
            }

            // Hash the password securely
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Update the password and clear the token from the database
            $sql = "UPDATE students SET password = :password, token = NULL WHERE token = :token";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            // Redirect to a success page or show a success message
            $_SESSION['success'] = "Your password has been set successfully!";
            header("Location: success.php"); // Redirect to a success page
            exit;
        }

        // Show the form if no POST request has been made
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Create Your Password</title>
        </head>
        <body>
            <h2>Create Your Password</h2>
            
            <!-- Display any session messages -->
            <?php if (isset($_SESSION['error'])): ?>
                <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php elseif (isset($_SESSION['success'])): ?>
                <p style="color:green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
            <?php endif; ?>

            <!-- Password creation form -->
            <form action="createAccount.php?token=<?php echo urlencode($token); ?>" method="POST">
                <label for="password">New Password:</label>
                <input type="password" name="password" required>
                <br><br>
                <button type="submit">Set Password</button>
            </form>
        </body>
        </html>

        <?php
    } catch (PDOException $e) {
        // Database connection or query error
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No token provided.";
}
?>

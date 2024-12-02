<?php
    session_start();
    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';

    // Function to sanitize user input
    function sanitize_input($data) {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    // Update student profile details
    if(isset($_POST['firstname']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST; 
        $setClause = [];
        $params = [];

        foreach ($data as $column => $value) {
            $value = sanitize_input($value);  // Sanitize the value before using it
            $value = (empty($value) && $value !== '0') ? NULL : $value;
            $setClause[] = "$column = :$column";
            $params[":$column"] = $value;
        }

        $setClauseString = implode(", ", $setClause);
        $student_id = $_SESSION['user_id'];

        $sql = "UPDATE students SET $setClauseString WHERE userID = :student_id";

        $stmt = $pdo->prepare($sql);
        $params[':student_id'] = $student_id;

        try {
            $stmt->execute($params);
            echo htmlspecialchars("Record updated successfully.", ENT_QUOTES, 'UTF-8');  // Output sanitized message
            header("Location: /editProfile");
        } catch (PDOException $e) {
            echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    }

    // Update former school information
    if(isset($_POST['formerschoolname']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $data = $_POST; 
        $setClause = [];
        $params = [];

        foreach ($data as $column => $value) {
            $value = sanitize_input($value);  // Sanitize the value before using it
            $value = (empty($value) && $value !== '0') ? NULL : $value;
            $setClause[] = "$column = :$column";
            $params[":$column"] = $value;
        }

        $setClauseString = implode(", ", $setClause);
        $student_id = $_SESSION['user_id'];

        $sql = "UPDATE students SET $setClauseString WHERE userID = :student_id";

        $stmt = $pdo->prepare($sql);
        $params[':student_id'] = $student_id;

        try {
            $stmt->execute($params);
            echo htmlspecialchars("Record updated successfully.", ENT_QUOTES, 'UTF-8');  // Output sanitized message
            header("Location: /editProfile");
        } catch (PDOException $e) {
            echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    }

    // Update username and password
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['newPassword']) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $username = sanitize_input($_POST['username']);  // Sanitize username
        $password = $_POST['password'];
        $newPassword = $_POST['newPassword'];
        $student_id = $_SESSION['user_id'];

        $sql = "SELECT password FROM users WHERE userID = :student_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':student_id' => $student_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

            $sql = "UPDATE users SET username = :username, password = :password WHERE userID = :student_id";
            $stmt = $pdo->prepare($sql);

            // Bind the parameters securely
            $params = [
                ':username' => $username,
                ':password' => $hashedPassword,
                ':student_id' => $student_id
            ];

            try {
                $stmt->execute($params);
                echo htmlspecialchars("Record updated successfully.", ENT_QUOTES, 'UTF-8');  // Output sanitized message
                header("Location: /editProfile");
            } catch (PDOException $e) {
                echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
            }
        } else {
            echo htmlspecialchars("Incorrect password.", ENT_QUOTES, 'UTF-8');
        }
    }
?>

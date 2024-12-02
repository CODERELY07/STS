<?php
require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php'; 

if (isset($_POST['id'])) {
    $id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);

    if ($id && is_numeric($id)) {
        try {
            $sql_userID = "SELECT UserID from instructors WHERE InstructorID = :id";
            $stmt_userID = $pdo->prepare($sql_userID);
            $stmt_userID->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt_userID->execute();
            $userID = $stmt_userID->fetchColumn();

            if ($userID) {
                $sql = "DELETE FROM instructors WHERE InstructorID = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                if ($stmt->execute()) {
                    $sql_user = "DELETE FROM users WHERE userID = :userID";
                    $stmt_user = $pdo->prepare($sql_user);
                    $stmt_user->bindParam(":userID", $userID);
                    if ($stmt_user->execute()) {
                        echo "Deleted Successfully!";
                    } else {
                        echo "Failed to delete user!";
                    }
                } else {
                    echo "Can't delete, something's wrong!";
                }
            } else {
                echo "Instructor not found!";
            }
        } catch (PDOException $e) {
            echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    } else {
        echo "Error: Invalid or missing instructor ID.";
    }
}
?>

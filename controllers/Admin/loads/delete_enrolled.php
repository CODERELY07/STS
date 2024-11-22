<?php
require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';
// delete_enrolled.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        
    

        $sql_users = "SELECT userID FROM students WHERE id = :id";
        $stmt_users = $pdo->prepare($sql_users);
        $stmt_users->execute(['id' => $id]);
        $row = $stmt_users->fetch(PDO::FETCH_ASSOC);
        $userID = $row['userID'];
           
        // Perform your delete operation, e.g. from the database
        $sql = "DELETE FROM students WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);

        $sql_delete = "DELETE FROM users WHERE userID = :userID";
        $stmt_delete = $pdo->prepare($sql_delete);
        $stmt_delete->execute(['userID' => $userID]);
        
        // Return a success message
        echo "Student deleted successfully.";
    } else {
        echo "Error: Student ID is missing.";
    }
}


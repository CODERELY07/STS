<?php

// This script deletes a student and associated user data from the database based on the provided student ID.
require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';

// delete_enrolled.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        // Sanitize and validate the student ID to ensure it's an integer
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        
        if ($id && is_numeric($id)) {
            // Fetch userID associated with the student ID
            $sql_users = "SELECT userID FROM students WHERE id = :id";
            $stmt_users = $pdo->prepare($sql_users);
            $stmt_users->execute(['id' => $id]);
            $row = $stmt_users->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                $userID = $row['userID'];

                // Delete student record 
                $sql = "DELETE FROM students WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['id' => $id]);

                // Delete associated user 
                $sql_delete = "DELETE FROM users WHERE userID = :userID";
                $stmt_delete = $pdo->prepare($sql_delete);
                $stmt_delete->execute(['userID' => $userID]);

              
                echo "Student deleted successfully.";
            } else {
                echo "Error: Student not found.";
            }
        } else {
            echo "Error: Invalid student ID.";
        }
    } else {
        echo "Error: Student ID is missing.";
    }
}

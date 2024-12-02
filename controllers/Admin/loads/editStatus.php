<?php

// Include configuration files and paths
require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';

// Check if the form has been submitted via POST and if the required data is present
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editStudentId'])) {
    // Debugging output (optional)
    // var_dump($_POST);

    // Retrieve student ID and status from the form
    $studentId = filter_var($_POST['editStudentId'], FILTER_SANITIZE_NUMBER_INT);
    $status = htmlspecialchars(trim($_POST['editStatus']), ENT_QUOTES, 'UTF-8');

   
    $sql = "UPDATE students SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);


    $stmt->execute([':status' => $status, ':id' => $studentId]);


    header("Location: /student");
    exit();
}

<?php

require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';
   // In editStatus.php, handle the form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editStudentId'])) {
    var_dump($_POST);
    $studentId = $_POST['editStudentId'];
    $status = $_POST['editStatus'];

    // Perform the necessary database update
    $sql = "UPDATE students SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':status' => $status, ':id' => $studentId]);
    // Optionally, redirect back to the page to clear the query parameter
    header("Location: /student");
    exit();
}

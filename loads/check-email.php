<?php

//this check if the email is exist in the database
// Include your database connection file
require '../config/config.php';

$email = $_POST['email'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'error|Invalid email format.';
    exit;
}

$query = "
    SELECT Email FROM instructors WHERE Email = :email
    UNION
    SELECT Email FROM students WHERE email = :email
";

try {
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // If email exists in either table, return an error message
    if ($stmt->rowCount() > 0) {
        echo 'error|This email is already in use.'; 
    } else {
        echo 'success|Email is available.'; 
    }

} catch (PDOException $e) {
    // Return a generic error message in case of failure
    echo 'error|Error checking email: ' . $e->getMessage();
}

?>

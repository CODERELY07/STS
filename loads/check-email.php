<?php
// Include your database connection file
require '../config/config.php';

$email = $_POST['email'];

// Prepare a query to check if the email exists in either the instructors or students table
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
        echo 'error|This email is already in use.'; // Return error message after 'error|'
    } else {
        echo 'success|Email is available.'; // Return success message after 'success|'
    }

} catch (PDOException $e) {
    // Return a generic error message in case of failure
    echo 'error|Error checking email: ' . $e->getMessage();
}

?>

<?php
    
    require_once '../config/config.php';
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and escape inputs (to prevent XSS)
        $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES, 'UTF-8');
        $lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES, 'UTF-8');
        $middlename = htmlspecialchars($_POST['middlename'], ENT_QUOTES, 'UTF-8');
        $address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
        $birthdate = htmlspecialchars($_POST['birthdate'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');

    // Validate First Name, Last Name, and Middle Name
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $firstname)) {
        echo 'First name should contain only letters, numbers, spaces, and symbols.';
        exit;
    }
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $middlename)) {
        echo 'Middle name should contain only letters, numbers, spaces, and symbols.';
        exit;
    }
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $lastname)) {
        echo 'Last name should contain only letters, numbers, spaces, and symbols.';
        exit;
    }
    // Validate Address
    if (!preg_match("/^[a-zA-Z\s,]+$/", $address)) {
        echo 'Address must be in the format: Barangay, City, Municipality.';
        exit;
    }
    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Email address is not valid.';
        exit;
    }
    $checkEmailQuery = "
    SELECT 1 FROM instructors WHERE Email = :email
    UNION ALL
    SELECT 1 FROM students WHERE email = :email
    ";

    $stmt = $pdo->prepare($checkEmailQuery);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "The email address is already in use!";
        exit;
    }

    // Validate Phone Number (must be exactly 11 digits)
    if (!preg_match("/^\d{11}$/", $phone)) {
        echo 'Phone number must be exactly 11 digits.';
        exit;
    }
    echo 'success';
}
?>

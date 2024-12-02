<?php

require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $getLastRowID = "SELECT * FROM instructors WHERE InstructorID=(SELECT max(InstructorID) FROM instructors)";
    $result = $pdo->query($getLastRowID);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['email'], $_POST['phone'])) {

        $firstname = htmlspecialchars(trim($_POST['firstname']), ENT_QUOTES, 'UTF-8');
        $middleName = htmlspecialchars(trim($_POST['middlename']), ENT_QUOTES, 'UTF-8');
        $lastName = htmlspecialchars(trim($_POST['lastname']), ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
        $phone = htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8');
        $errors = [];

        if (empty($firstname) || empty($lastName) || empty($email) || empty($phone)) {
            echo "Error: All fields are required.";
            exit;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Error: Invalid email format.";
            exit;
        }

        if (!preg_match('/^[\d\s\-\+]{7,15}$/', $phone)) {
            echo "Error: Invalid phone number format.";
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

        $getLastRowID = "SELECT * FROM instructors WHERE InstructorID = (SELECT max(InstructorID) FROM instructors)";
        $result = $pdo->query($getLastRowID);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $lastInstructorID = $row['InstructorID'];
            $numericPart = (int)substr($lastInstructorID, 4); 
            $newInstructorID = date("Y") . str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT); 
        } else {
            $newInstructorID = date("Y") . "001";
        }

        try {
            $sql = "INSERT INTO instructors (InstructorID, FirstName, MiddleName, LastName, Email, Phone) 
                    VALUES (:instructorID, :firstname, :middleName, :lastName, :email, :phone)";
            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':instructorID', $newInstructorID, PDO::PARAM_STR);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':middleName', $middleName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

            if ($stmt->execute()) {
                echo "User Added Successfully";
            } else {
                echo "Error: Can't add user right now";
            }
        } catch (PDOException $e) {
            echo "Error: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
        }
    } else {
        echo "Error: Missing form data.";
    }
}
?>

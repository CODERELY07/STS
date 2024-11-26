<?php

require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $getLastRowID = "SELECT * FROM instructors WHERE InstructorID=(SELECT max(InstructorID) FROM instructors)";
    $result = $pdo->query($getLastRowID);
    $row = $result->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['email'], $_POST['phone'])) {
 
        $firstname = trim($_POST['firstname']);
        $middleName = trim($_POST['middlename']);
        $lastName = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);


        if (empty($firstname) || empty($lastName) || empty($email) || empty($phone)) {
            echo "Missing required fields.";
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
            echo "The email address is already use!";
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


            $stmt->bindParam(':instructorID', $newInstructorID, PDO::PARAM_STR); // Make sure to bind as a string
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
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Error: Missing form data.";
    }
}
?>

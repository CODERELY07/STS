<?php

require './../config/config.php';
session_start();
// Collect form data
$firstname = trim($_POST['firstname']);
$middlename = trim($_POST['middlename']);
$lastname = trim($_POST['lastname']);	
$gender = trim($_POST['gender']);
$dateofbirth = trim($_POST['dateofbirth']);
$email = trim($_POST['email']);
$phonenumber = trim($_POST['phonenumber']);
$address = trim($_POST['address']);
$formerschoolname = trim($_POST['formerSchoolName']);
$formerschooladdress = trim($_POST['formerSchoolAddress']); 
$graduationyear = trim($_POST['formerSchoolYear']); 
$department = trim($_POST['department']); 
$program = trim($_POST['program']); 
$status = "registered";


try {
    $sql = "INSERT INTO students (firstname, middlename, lastname, gender, dateofbirth, email, address, phone, status, formerschoolname, formerschooladdress, graduationyear, department, program) 
            VALUES (:firstname, :middlename, :lastname, :gender, :dateofbirth, :email, :address, :phonenumber, :status, :formerschoolname, :formerschooladdress, :graduationyear, :department, :program)";
    

    $stmt = $pdo->prepare($sql);
    
  
    $exe = $stmt->execute([
        ':firstname' => $firstname,
        ':middlename' => $middlename,
        ':lastname' => $lastname,
        ':gender' => $gender,
        ':dateofbirth' => $dateofbirth,
        ':email' => $email,
        ':address' => $address,
        ':phonenumber' => $phonenumber,
        ':status' => $status,
        ':formerschoolname' => $formerschoolname,
        ':formerschooladdress' => $formerschooladdress,
        ':graduationyear' => $graduationyear,
        ':department' => $department,
        ':program' => $program
    ]);
    // Check if the data was inserted successfully
    if ($exe) {
        //get the last inserted student id
        $studentID = $pdo->lastInsertId();
        
        echo "Data Added Successfully!";
        $_SESSION['registered'] = true;
        $_SESSION['studentID'] = $studentID;
        return false;
        exit();
    } else {
        echo "Error: Unable to add data!";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

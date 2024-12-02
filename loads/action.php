<?php
    // Handles the student registration process: collects form data, inserts it into the database, and stores the student ID in the session.

    require '../preventer.php';
    require './../config/config.php';
    session_start();

    $firstname = htmlspecialchars(trim($_POST['firstname']), ENT_QUOTES, 'UTF-8');
    $middlename = htmlspecialchars(trim($_POST['middlename']), ENT_QUOTES, 'UTF-8');
    $lastname = htmlspecialchars(trim($_POST['lastname']), ENT_QUOTES, 'UTF-8');
    $gender = htmlspecialchars(trim($_POST['gender']), ENT_QUOTES, 'UTF-8');
    $dateofbirth = htmlspecialchars(trim($_POST['dateofbirth']), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
    $phonenumber = htmlspecialchars(trim($_POST['phonenumber']), ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
    $formerschoolname = htmlspecialchars(trim($_POST['formerSchoolName']), ENT_QUOTES, 'UTF-8');
    $formerschooladdress = htmlspecialchars(trim($_POST['formerSchoolAddress']), ENT_QUOTES, 'UTF-8');
    $graduationyear = htmlspecialchars(trim($_POST['formerSchoolYear']), ENT_QUOTES, 'UTF-8');
    $department = htmlspecialchars(trim($_POST['department']), ENT_QUOTES, 'UTF-8');
    $program = htmlspecialchars(trim($_POST['program']), ENT_QUOTES, 'UTF-8');
    
    $status = "registered";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        return;
    }
    
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
            ':program' => $program,
        ]);
        
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

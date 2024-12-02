<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
$_SESSION['message'] = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    
    // Get and validate the user ID
    $id = $_POST['id'];

    if (!is_numeric($id) || $id <= 0) {
        $_SESSION['message'] = "Invalid User ID.";
        exit;
    }

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';

    try {
        // Fetch the email address based on the user ID
        $stmt = $pdo->prepare("SELECT * FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            $_SESSION['message'] = "No user found with that ID.";
            exit;
        }

        $email = $user['email'];
        $status = $user['status'];

        // Generate a token and store it in the database
        $token = bin2hex(random_bytes(16));

        $stmt = $pdo->prepare("UPDATE students SET token = :token WHERE id = :id");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Registration link
        $registration_link = "http://localhost/controllers/createAccount.php?id=" . urlencode($id) . "&token=" . urlencode($token);

        // Include the PHPMailer class
        require VENDOR_PATH . 'autoload.php';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'calipjo.markely@gmail.com'; 
            $mail->Password = 'fwai lidk iyss dtso'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('calipjo.markely@gmail.com', 'Mark Ely Calipjo');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Complete Your Registration';

            // Safely escape data before inserting into the email body
            $userFirstName = htmlspecialchars($user['firstname'], ENT_QUOTES, 'UTF-8');
            $userLastName = htmlspecialchars($user['lastname'], ENT_QUOTES, 'UTF-8');

            $fail = "
                <html>
                <head>
                    <title>Your Exam Status</title>
                </head>
                <body>
                    <p>Hello, {$userFirstName} {$userLastName}</p>
                    <p>We're Sorry you failed the test.</p>
                </body>
                </html>
            ";
            
            $pass = "
            <html>
            <head>
                <title>Complete Your Registration</title>
            </head>
            <body>
                <p>Hello,</p>
                <p>Thank you for registering with us! To complete your registration, please click the following link:</p>
                <p><a href='" . htmlspecialchars($registration_link, ENT_QUOTES, 'UTF-8') . "'>Complete Registration</a></p>
                <p>If you did not request this registration, please ignore this email.</p>
                <p>Best regards,<br>SMS</p>
            </body>
            </html>
            ";

            if ($status == 'pass') {
                $mail->Body = $pass;
            } else {
                $sql = "DELETE FROM students WHERE id = $id && status = 'fail'";
                $stmt = $pdo->query($sql);
                $mail->Body = $fail;
            }

            // Send the email
            if ($mail->send()) {
                 $_SESSION['message'] =  'Registration email has been sent to ' . $email;
            } else {
                 $_SESSION['message'] =  'Failed to send registration email.';
            }

        } catch (Exception $e) {
             $_SESSION['message'] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch (PDOException $e) {
         $_SESSION['message'] =  "Database error: " . $e->getMessage();
    }
    header('Location: /student');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['InstructorID'])) {

    // Get and validate the user ID
    $InstructorID = $_POST['InstructorID'];

    if (!is_numeric($InstructorID) || $InstructorID <= 0) {
         $_SESSION['message'] =  "Invalid User ID.";
        exit;
    }

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';

    try {
        // Fetch the email address based on the user ID
        $stmt = $pdo->prepare("SELECT email,FirstName, LastName FROM instructors WHERE InstructorID = :InstructorID");
        $stmt->bindParam(':InstructorID', $InstructorID, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch email and status in one go
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
             $_SESSION['message'] =  "No user found with that ID.";
            exit;
        }

        $email = $user['email'];

        // Generate a token and store it in the database
        $token = bin2hex(random_bytes(16));

        $stmt = $pdo->prepare("UPDATE instructors SET token = :token WHERE InstructorID = :InstructorID");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':InstructorID', $InstructorID, PDO::PARAM_INT);
        $stmt->execute();

        // Registration link
        $registration_link = "http://localhost/controllers/createAccount.php?InstructorID=" . urlencode($InstructorID) . "&token=" . urlencode($token);

        // Include the PHPMailer class
        require VENDOR_PATH . 'autoload.php';

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'calipjo.markely@gmail.com'; // Update to use environment variables or config
            $mail->Password = 'fwai lidk iyss dtso'; // Update to use environment variables or config
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('calipjo.markely@gmail.com', 'Mark Ely Calipjo');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Complete Your Registration';
            
            // Safely escape data before inserting into the email body
            $userFirstName = htmlspecialchars($user['FirstName'], ENT_QUOTES, 'UTF-8');
            $userLastName = htmlspecialchars($user['LastName'], ENT_QUOTES, 'UTF-8');

            $mail->Body = "
            <html>
            <head>
                <title>Complete Your Registration</title>
            </head>
            <body>
                <p>Hello, {$userFirstName} {$userLastName}</p>
                <p>You are the new Instructor Please click the link for your account registration</p>
                <p><a href='" . htmlspecialchars($registration_link, ENT_QUOTES, 'UTF-8') . "'>Complete Registration</a></p>
                <p>If you did not request this registration, please ignore this email.</p>
                <p>Best regards,<br>SMS</p>
            </body>
            </html>
            ";

            // Send the email
            if ($mail->send()) {
                 $_SESSION['message'] =  'Registration email has been sent to ' . $email;
            } else {
                 $_SESSION['message'] =  'Failed to send registration email.';
            }

        } catch (Exception $e) {
             $_SESSION['message'] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch (PDOException $e) {
         $_SESSION['message'] =  "Database error: " . $e->getMessage();
    }
    header('Location: /instructor');
    exit();
}
?>

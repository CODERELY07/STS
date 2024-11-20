<?php
// Include the PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Capture the User ID from the form
    $id = $_POST['id'];

    // Validate the ID
    if (!is_numeric($id) || $id <= 0) {
        echo "Invalid User ID.";
        exit;
    }

    // Database connection
    require_once '../config/config.php';  // Include your database connection file

    // Query the database to get the user's email based on the provided ID
    try {
        // Prepare the query to fetch the email using the user ID
        $stmt = $pdo->prepare("SELECT email FROM students WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch the email address
        $email = $stmt->fetchColumn();

        if (!$email) {
            echo "No user found with that ID.";
            exit;
        }

        // Generate a unique token (you can use other methods for token generation)
        $token = bin2hex(random_bytes(16));  // Generates a 32-character token

        // Store the token in the database along with the user ID (for later verification)
        $stmt = $pdo->prepare("UPDATE students SET token = :token WHERE id = :id");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Create the registration link with the user ID and token
        $registration_link = "http://localhost/controllers/createAccount.php?id=" . urlencode($id) . "&token=" . urlencode($token);

        // Use PHPMailer to send the email
        require '../vendor/autoload.php'; // If you're using Composer for PHPMailer's autoloader

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();  // Send using SMTP
            $mail->Host = 'smtp.gmail.com';  // Use Gmail's SMTP server
            $mail->SMTPAuth = true;  // Enable SMTP authentication
            $mail->Username = 'calipjo.markely@gmail.com';  // Your Gmail address
            $mail->Password = 'fwai lidk iyss dtso';  // Your Gmail App Password (if 2FA is enabled)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Encryption method
            $mail->Port = 587;  // TCP port for STARTTLS (use 465 for SSL)

            // Recipients
            $mail->setFrom('calipjo.markely@gmail.com', 'Mark Ely Calipjo');  // Sender's email and name
            $mail->addAddress($email);  // Recipient's email

            // Content
            $mail->isHTML(true);  // Set email format to HTML
            $mail->Subject = 'Complete Your Registration';
            $mail->Body = "
                <html>
                <head>
                    <title>Complete Your Registration</title>
                </head>
                <body>
                    <p>Hello,</p>
                    <p>Thank you for registering with us! To complete your registration, please click the following link:</p>
                    <p><a href='" . $registration_link . "'>Complete Registration</a></p>
                    <p>If you did not request this registration, please ignore this email.</p>
                    <p>Best regards,<br>The Example Team</p>
                </body>
                </html>
            ";

            // Send the email
            if ($mail->send()) {
                echo 'Registration email has been sent to ' . $email;
            } else {
                echo 'Failed to send registration email.';
            }

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } catch (PDOException $e) {
        // In case of a database error
        echo "Database error: " . $e->getMessage();
    }
}
?>

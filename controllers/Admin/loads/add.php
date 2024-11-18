<?php 

// Include required configuration files
require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';


// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $getLastRowID = "SELECT * FROM instructors WHERE InstructorID=(SELECT max(InstructorID) FROM instructors)";
    $result = $pdo->query($getLastRowID);
    $row = $result->fetch(PDO::FETCH_ASSOC);
  // Ensure form data is received and sanitized
    if (isset($_POST['firstname'], $_POST['middlename'], $_POST['lastname'], $_POST['email'], $_POST['phone'])) {
        
        // Sanitize user input to prevent SQL injection
        $firstname = trim($_POST['firstname']);
        $middleName = trim($_POST['middlename']);
        $lastName = trim($_POST['lastname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        if ($row) {
            $instructorID = date("Y") . ($row['InstructorID'][0] + 1); 
        } else {
            $instructorID = date("Y") . "001";  
        }
        // Validate required fields (add validation as necessary)
        if (empty($firstname) || empty($lastName) || empty($email) || empty($phone)) {
            echo "Error: Missing required fields.";
            exit;
        }

        try {
            // Prepare SQL statement to insert data
            $sql = "INSERT INTO instructors (InstructorID,FirstName, MiddleName, LastName, Email, Phone) VALUES (:instructorID,:firstname, :middleName, :lastName, :email, :phone)";
            $stmt = $pdo->prepare($sql);

            // Bind parameters to the SQL statement
            $stmt->bindParam(':instructorID', $instructorID, PDO::PARAM_INT);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':middleName', $middleName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

            // Execute the SQL query
            if ($stmt->execute()) {
                echo "User Added Successfully";
            } else {
                echo "Error: Can't add user right now";
            }

        } catch (PDOException $e) {
            // Handle database errors
            echo "Error: " . $e->getMessage();
        }

    } else {
        echo "Error: Missing form data.";
    }
}
?>

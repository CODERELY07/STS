<?php
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize and escape inputs (to prevent XSS)
        $formerSchoolName = htmlspecialchars($_POST['formerSchoolName'], ENT_QUOTES, 'UTF-8');
        $formerSchoolAddress = htmlspecialchars($_POST['formerSchoolAddress'], ENT_QUOTES, 'UTF-8');

    // Validate Former School Name
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $formerSchoolName)) {
        echo 'Former school name should contain only letters, spaces, and symbols.';
        exit;
    }

    // Validate Former School Address
    if (!preg_match("/^[a-zA-Z\s,]+$/", $formerSchoolAddress)) {
        echo 'Former school address must be in the format: Barangay, City, Municipality.';
        exit;
    }
    echo 'success';
}
?>

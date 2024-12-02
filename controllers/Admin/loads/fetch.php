<?php

// Include the required configuration files
require_once(__DIR__ . '/../../../paths.php');
require CONFIG_PATH . 'config.php';

// SQL query to select all instructors, ordered by InstructorID in descending order
$sql = "SELECT * FROM instructors ORDER BY InstructorID DESC";
$stmt = $pdo->query($sql);

// Initialize the HTML output for the table
$output = "
    <div class='table-responsive'>
        <table class='table table-strippped'>
            <tr>
                <th class='w-15%'>ID</th>
                <th class='w-15%'>First Name</th>
                <th class='w-15%'>Middle Name</th>
                <th class='w-15%'>Last Name</th>
                <th class='w-15%'>Email</th>
                <th class='w-15%'>Phone</th>
                <th class='w-10%'>Delete</th>
            </tr>
";

// Check if the query returned any rows
if($stmt->rowCount() > 0){
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all rows
    if($rows){
        // Loop through each row and generate the table rows
        foreach ($rows as $row) {
            $instructorID = htmlspecialchars($row['InstructorID'], ENT_QUOTES, 'UTF-8');
            $firstName = htmlspecialchars($row['FirstName'], ENT_QUOTES, 'UTF-8');
            $middleName = htmlspecialchars($row['MiddleName'], ENT_QUOTES, 'UTF-8');
            $lastName = htmlspecialchars($row['LastName'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($row['Email'], ENT_QUOTES, 'UTF-8');
            $phone = htmlspecialchars($row['Phone'], ENT_QUOTES, 'UTF-8');

            $output .= "
                <tr>
                    <td> {$row['InstructorID']}</td>
                    <td class='firstnameedit' data-id1='{$row['InstructorID']}' contenteditable> {$row['FirstName']}</td>
                    <td class='middlenameedit' data-id2='{$row['InstructorID']}' contenteditable> {$row['MiddleName']}</td>
                    <td class='lastnameedit' data-id3='{$row['InstructorID']}' contenteditable> {$row['LastName']}</td>
                    <td class='emailedit' data-id4='{$row['InstructorID']}' contenteditable> {$row['Email']}</td>
                    <td class='phoneedit' data-id5='{$row['InstructorID']}' contenteditable> {$row['Phone']}</td>
                    <td><button class='btn btn_delete btn-xs btn-danger' data-id2='{$row['InstructorID']}'>Delete</button></td>
                    <td> 
                        <form action='/send_email' method='POST'>
                            <input type='hidden' name='InstructorID' id='InstructorID' value='{$row["InstructorID"]}'>
                            <button type='submit' class='btn'>Send Message</button>
                        </form>
                    </td>
                </tr>
            ";
        }
    }
} else {
    // If no instructors exist, display a message
    $output .= "<tr><td colspan=7 class='p-4 text-center'> No Instructors Exist! </td></tr>";
    $output .= '</table> </div>';
}

// Output the table HTML
echo $output;


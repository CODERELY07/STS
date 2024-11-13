<?php
    
    
    require_once(__DIR__ . '/../../paths.php');
    require_once  VENDOR_PATH . 'autoload.php';
    use Dompdf\Dompdf;
    require_once CONFIG_PATH . 'config.php';
    session_start();

    // Check if student ID exists in session
    if (!isset($_SESSION['studentID'])) {
        die('Student ID not found in session.');
    }

    $id = $_SESSION['studentID'];

    // Prepare and execute the query to fetch student data
    $sql = "SELECT * FROM students WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch the student data (single row)
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if student data is found
    if (!$row) {
        die('Student not found.');
    }

    // HTML structure for the PDF
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
        <style>
            h2{
                text-align: center;
                font-weight: bold;
            }
            table{
                border-collapse: collapse;
                width:100%;
            }
            td, th{
                border: 1px solid #444;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <h2>Student Information</h2>
        <h4>Student Details</h4>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Date Of Birth</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . htmlspecialchars($row['id']) . '</td>
                    <td>' . htmlspecialchars($row['firstname']) . '</td>
                    <td>' . htmlspecialchars($row['middlename']) . '</td>
                    <td>' . htmlspecialchars($row['lastname']) . '</td>
                    <td>' . htmlspecialchars($row['gender']) . '</td>
                    <td>' . htmlspecialchars($row['dateofbirth']) . '</td>
                    <td>' . htmlspecialchars($row['email']) . '</td>
                    <td>' . htmlspecialchars($row['phone']) . '</td>
                    <td>' . htmlspecialchars($row['address']) . '</td>
                </tr>
            </tbody>
        </table>
        <h4>Student Former School Details</h4>
        <table>
            <thead>
                <tr>
                    <th>Former School Name</th>
                    <th>Former School Address</th>
                    <th>Former School Graduation</th>
                    <th>Department</th>
                    <th>Program</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>' . htmlspecialchars($row['formerschoolname']) . '</td>
                    <td>' . htmlspecialchars($row['formerschooladdress']) . '</td>
                    <td>' . htmlspecialchars($row['graduationyear']) . '</td>
                    <td>' . htmlspecialchars($row['department']) . '</td>
                    <td>' . htmlspecialchars($row['program']) . '</td>
                </tr>
            </tbody>
        </table>
    </body>
    </html>';

    // Initialize Dompdf
    $dompdf = new Dompdf;
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Stream the PDF to the browser
    $dompdf->stream('StudentInformation.pdf', ['Attachment' => 0]);
?>

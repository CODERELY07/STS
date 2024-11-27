<?php
require_once(__DIR__ . '/../../paths.php');
require_once APP_PATH . 'app.php';
require_once VENDOR_PATH . 'autoload.php';
use Dompdf\Dompdf;
require_once CONFIG_PATH . 'config.php';
session_start();

if (!isset($_SESSION['studentID'])) {
    die('Student ID not found in session.');
}

$id = $_SESSION['studentID'];

$sql = "SELECT * FROM students WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die('Student not found.');
}

$sql_program = "SELECT * FROM program WHERE ProgramName = :programName";
$stmt_program = $pdo->prepare($sql_program);
$stmt_program->bindParam(':programName', $row['program']);
$stmt_program->execute();
$program = $stmt_program->fetch(PDO::FETCH_ASSOC);

$sql_course = "SELECT * FROM courses WHERE ProgramID = :programid";
$stmt_course = $pdo->prepare($sql_course);
$stmt_course->bindParam(':programid', $program['ProgramID']);
$stmt_course->execute();
$courses = $stmt_course->fetchAll(PDO::FETCH_ASSOC);

$html = "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>SMS Pdf</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }
        h2, h3 {
            text-align: center;
            margin: 0;
            margin-top: 45px;
        }
        .row {
            clear: both;
            margin-top: 0;
        }
        .w-50 {
            width: 48%;
            float: left;
            margin-right: 4%;
        }
        .w-50:last-child {
            margin-right: 0;
        }
        .w-25 {
            width: 23%;
            float: left;
            margin-right: 4%;
        }
        .w-25:last-child {
            margin-right: 0;
        }
        .text-right {
            text-align: right;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #000;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        .table-footer td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class='container'>
        <h2>Student Information</h2>
        <div class='row'>
            <div class='w-50'>
                <p><span>Name:</span><b> {$row['firstname']} {$row['middlename']} {$row['lastname']}</b></p>
                <p><span>Age:</span> <b style='margin-right:20px'>" . getAge($row['dateofbirth']) . "</b><span>Birthdate:</span> <b>{$row['dateofbirth']}</b></p>
                <p><span>Address:</span> <b>{$row['address']}</b></p>
            </div>
            <div class='w-50 text-right'>
                <p><span>ID No. </span><b>N/A</b></p>
                <p><span>Email: </span><b>{$row['email']}</b></p>
                <p><span>Phone No. </span><b>{$row['phone']}</b></p>
            </div>
        </div>

        <h3>Enrolled Subjects</h3>
        <div>
            <p style='text-align:center'><small>Course/Yr: <b>{$row['program']}</b></small></p>
            <table>
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Course Name</th>
                        <th>Units</th>
                        <th>TF</th>
                        <th>Laboratory</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>";

                foreach ($courses as $course) {
                    $html .= "
                                    <tr>
                                        <td>" . htmlspecialchars($course['SubjectCode']) . "</td>
                                        <td>" . htmlspecialchars($course['CourseName']) . "</td>
                                        <td>" . htmlspecialchars($course['units']) . "</td>
                                        <td>" . htmlspecialchars($course['TF']) . "</td>
                                        <td>" . htmlspecialchars($course['Laboratory']) . "</td>
                                        <td>N/A</td>
                                    </tr>";
                }

                $totalUnits = 0;
                $totalTF = 0;
                $totalLab = 0;

                foreach ($courses as $course) {
                    $totalUnits += (float)$course['units'];
                    $totalTF += (float)$course['TF'];
                    $totalLab += (float)$course['Laboratory'];
                }

                $totalUnits = number_format($totalUnits, 1);
                $totalTF = number_format($totalTF, 1);
                $totalLab = number_format($totalLab, 1);

                $html .= "
                </tbody>
                <tfoot class='table-footer'>
                    <tr>
                        <td colspan='3' class='text-end'>Total Units: <b>{$totalUnits}</b></td>
                        <td><b>{$totalTF}</b></td>
                        <td><b>{$totalLab}</b></td>
                        <td><b>--</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <h3>Academic Background</h3>
        <div class='row'>
            <div class='w-50'>
                <p><span>Previous Institution: </span><b>{$row['formerschoolname']}</b></p>
            </div>
            <div class='w-25'>
                <p><span>SY: </span><b>" . getSchoolYear($row['graduationyear']) . "</b></p>
            </div>
            <div class='w-25'>
                <p><span>Program: </span><b>{$row['program']}</b></p>
            </div>
        </div>
        <div class='row'>
            <div class='w-50'>
                <p><span>Address: </span><b>{$row['formerschooladdress']}</b></p>
            </div>
            <div class='w-50'>
                <p class='text-right'><span>Department: </span><b>{$row['department']}</b></p>
            </div>
        </div>
    </div>
</body>
</html>";

$dompdf = new Dompdf;
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('StudentInformation.pdf', ['Attachment' => 0]);
?>

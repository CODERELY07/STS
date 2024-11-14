<?php


   require_once(__DIR__ . '/../paths.php');
   require_once APP_PATH . 'app.php';
   require_once CONFIG_PATH . 'config.php';
//    session_start();

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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        p{
            font-size:14px;
        }
        tr{
            border-top:2px solid #000;
        }
        tr:first-child{
            border-top:3px solid #000;
        }
        th,td{
            padding:10px 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Student Information</h2>

        <div class="row mb-4 mt-5 px-4">
            <div class="col-7">
                <p><span>Name:</span> <b> <?= $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname']?></b></p>
                <p><span class="me-3">Age:<b><?php getAge($row['dateofbirth'])?></b></span> <span>Birthdate: <b></b></span></p>
                <p><span>Address:</span> La Purisma Nabua Camarines Sur</p>
            </div>
            <div class="col-5">
                <p><span>ID No. </span><b>2024001</b></p>
                <p><span>Email: </span><b>calipjo.markel@gmail.com</b></p>
                <p><b>09302727854</b></p>
            </div>
        </div>
        <h4 class="text-center">Enrolled Subjects</h4>
        <div class="container">
            <p class="text-center"><small>Course/Yr: <b>BSIT</b></small></p>
            <table class="w-100 col-lg-12">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Description</th>
                        <th>Units</th>
                        <th>TF</th>
                        <th>Laboratory</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CCIT 104</td>
                        <td>Data Stucture & Algorithm</td>
                        <td>3.0</td>
                        <td>3.0</td>
                        <td>1.0</td>
                        <td>BSIT</td>
                    </tr>
                    <tr>
                        <td>CCIT 104</td>
                        <td>Data Stucture & Algorithm</td>
                        <td>3.0</td>
                        <td>3.0</td>
                        <td>1.0</td>
                        <td>BSIT</td>
                    </tr>
                    <tr>
                        <td>CCIT 104</td>
                        <td>Data Stucture & Algorithm</td>
                        <td>3.0</td>
                        <td>3.0</td>
                        <td>1.0</td>
                        <td>BSIT</td>
                    </tr>
                    <tr>
                        <td>CCIT 104</td>
                        <td>Data Stucture & Algorithm</td>
                        <td>3.0</td>
                        <td>3.0</td>
                        <td>1.0</td>
                        <td>BSIT</td>
                    </tr>
                    <tr>
                        <td>CCIT 104</td>
                        <td>Data Stucture & Algorithm</td>
                        <td>3.0</td>
                        <td>3.0</td>
                        <td>1.0</td>
                        <td>BSIT</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end" style="padding-right:30px">Total Units: <b>12.0</b></td>
                        <td><b>12.0</b></td>
                        <td><b>5.0</b></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="container w-100 mt-5">
            <h4 class="text-center">Academic Background</h4>
            <br>
            <div class="row">
                <div class="col-6">
                    <p><span>Previous Insitution: </span><b>CAMARINES SUR POLYTHECNIC COLLEGES</b></p>
                </div>
                <div class="col-3">
                    <p><span>SY: </span><b>2023-2024</b></p>
                </div>
                <div class="col-3">
                    <p><span>Program: </span><b>BSIT</b></p>
                </div>
            </div>
            <div class="row d-flex justify-content-space-between">
                <div class="col-6">
                    <p>Address: <b>Iriga City, Camarines Sur</b></p>
                </div>
                <div class="col-6">
                    <p class="text-end"><span>Department: </span><b>College of Computer Studies</b></p>
                </div>
            </div>
         
        </div>
    </div>
    <script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </script>
</body>
</html>
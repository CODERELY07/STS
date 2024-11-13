<?php
    
    define("CONTROLLERS_PATH" , __DIR__ . '/../../controllers/index.php');
    session_start();
    if(!isset($_SESSION['registerd']) && $_SESSION['registered'] == FALSE){
        header("Location: " . CONTROLLERS_PATH);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <p class="center">You are registered We will send email for you exam sooner and please come to the school with you data printed, download your <a href="/pdf" target="_blank">Here</a></p>
        </div>
    </div>
</body>
</html>
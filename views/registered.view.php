<?php
    
    define("CONTROLLERS_PATH" , __DIR__ . '/../../controllers/index.php');

    if(!isset($_SESSION['registerd']) && $_SESSION['registered'] == FALSE){
        header("Location: " . CONTROLLERS_PATH);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Registered</title>
    <link rel="icon" type="image/x-icon" href="../src/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css?<?php echo time()?>">
    <link rel="stylesheet" href="../css/register.css?<?php echo time()?>">
</head>
<body>
    <?php   require 'partials/register-header.php';?>
        <h6 class="mx-auto mt-2 text-uppercase text-center p-5 color-main" style="font-weight:600;line-height:30px;">You Are now registered! keep in touch, sooner we will be sending your exam result. dowNload your data <a class="color-main" href="/pdf" target="_blank">Here.</a></h6>

</body>
</html>
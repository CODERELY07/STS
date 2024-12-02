<?php
    // This script checks if the request method is not POST. 
    // If it's not a POST request, it redirects the user to the 'index.php' page and stops further execution.

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: index.php');
        exit();
    }

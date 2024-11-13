<?php
    
    require_once(__DIR__ . '/../../paths.php');
    // var_dump(__DIR__ . '/../../paths.php');
    require_once(APP_PATH . 'app.php');
    // var_dump(DATA_PATH . 'departments.csv');
    $departments = readCsv( DATA_PATH . 'departments.csv');
    $programs = readCsv(DATA_PATH . 'programs.csv');

?>
<?php

// Include necessary files for the application
require_once(__DIR__ . '/../../paths.php');
// Uncomment for debugging paths
// var_dump(__DIR__ . '/../../paths.php');
require_once(APP_PATH . 'app.php');
// Uncomment for debugging CSV paths
// var_dump(DATA_PATH . 'departments.csv');

// Read the 'departments' CSV file into an array
$departments = readCsv(DATA_PATH . 'departments.csv');

// Read the 'programs' CSV file into an array
$programs = readCsv(DATA_PATH . 'programs.csv');

?>

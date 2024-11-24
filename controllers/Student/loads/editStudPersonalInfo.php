<?php

    session_start();
    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';

    $data = $_POST; 
    $setClause = [];
    $params = [];

    foreach ($data as $column => $value) {
        $value = (empty($value) && $value !== '0') ? NULL : $value;
        $setClause[] = "$column = :$column";
        $params[":$column"] = $value;
    }

    $setClauseString = implode(", ", $setClause);

    $student_id = $_SESSION['user_id'];


    $sql = "UPDATE students SET $setClauseString WHERE userID = :student_id";


    $stmt = $pdo->prepare($sql);
    $params[':student_id'] = $student_id;

    try {
        $stmt->execute($params);
        echo "Record updated successfully.";
        header("Location: /editProfile");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }



?>

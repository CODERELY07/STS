<?php

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';
    
    $sql = "SELECT * FROM instructors ORDER BY InstructorID DESC";
    $stmt = $pdo->query($sql);
    
    $output = "
        <div class='table-responsive'>
            <table class='table table-strippeed'>
                <tr>
                    <th class='w-40%'>ID</th>
                    <th class='w-40%'>First Name</th>
                    <th class='w-20%'>Delete</th>
                </tr>
                ";
    if($stmt->rowCount() > 0){
        $rows = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        if($rows){
            foreach ($rows as $row) {
                $output .= 
                    "<tr>
                        <td> {$row['InstructorID']}</td>
                        <td class='firstname' data-id1='{$row['InstructorID']}' contenteditable> {$row['FirstName']}</td>
                        <td><button class='btn btn_delete btn-xs btn-danger' data-id2='{$row['InstructorID']}'>x</button></td>
                    </tr>";
            }
        }
        $output .= '  
        <tr>  
             <td></td>  
             <td></td>  
             <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStudent">+
                </button>
            </td>  
                    </tr>
            ';  
    }else{
        $output .= "<tr><td colspan=4> Data not found! </td></tr>";
        $output .= '</table> </div>';
    }

    echo $output;
   

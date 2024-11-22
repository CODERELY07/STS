<?php

    require_once(__DIR__ . '/../../../paths.php');
    require CONFIG_PATH . 'config.php';
    
    $sql = "SELECT * FROM instructors ORDER BY InstructorID DESC";
    $stmt = $pdo->query($sql);
    
    $output = "
        <div class='table-responsive'>
            <table class='table table-strippeed'>
                <tr>
                    <th class='w-15%'>ID</th>
                    <th class='w-15%'>First Name</th>
                    <th class='w-15%'>Middle Name</th>
                    <th class='w-15%'>Last Name</th>
                    <th class='w-15%'>Email</th>
                    <th class='w-15%'>Phone</th>
                    <th class='w-10%'>Delete</th>
                </tr>
                ";
    if($stmt->rowCount() > 0){
        $rows = $stmt->fetchAll(PDO:: FETCH_ASSOC);
        if($rows){
            foreach ($rows as $row) {
                $output .= 
                    "<tr>
                        <td> {$row['InstructorID']}</td>
                        <td class='firstnameedit' data-id1='{$row['InstructorID']}' contenteditable> {$row['FirstName']}</td>
                        <td class='middlenameedit' data-id2='{$row['InstructorID']}' contenteditable> {$row['MiddleName']}</td>
                        <td class='lastnameedit' data-id3='{$row['InstructorID']}' contenteditable> {$row['LastName']}</td>
                        <td class='emailedit' data-id4='{$row['InstructorID']}' contenteditable> {$row['Email']}</td>
                        <td class='phoneedit' data-id5='{$row['InstructorID']}' contenteditable> {$row['Phone']}</td>
                        <td><button class='btn btn_delete btn-xs btn-danger' data-id2='{$row['InstructorID']}'>Delete</button></td>
                        <td> 
                              <form action='/send_email' method='POST'>
                                <input type='hidden' name='InstructorID' id='InstructorID' value='{$row["InstructorID"]}'>
                                <button type='submit' class='btn'>Send Message</button>
                            </form>
                        </td>
                    </tr>";
            }
        }
    }else{
        $output .= "<tr><td colspan=7 class='p-4 text-center'> No Instuctors Exists! </td></tr>";
        $output .= '</table> </div>';
    }

    echo $output;
   

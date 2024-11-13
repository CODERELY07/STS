<?php

   require './../views/partials/readCsv.php';

    if(isset($_GET['deparmentName'])){
        $programOption = '<option value=""></option>';
        $deparmentName = $_GET['deparmentName'];
            foreach($programs as $program){
                if($program['deparmentName'] == $deparmentName){
                $programOption .= '<option value="' . $program['programName'] . '">' . $program['programName'] . '</option>';
            }
        }

        echo $programOption;
    }
?>
<?php
    
    // Fetches and outputs program options based on the selected department name from the query parameter.

   require './../views/partials/readCsv.php';

    if(isset($_GET['deparmentName'])){
        $programOption = '<option value=""></option>';
        $deparmentName = htmlspecialchars($_GET['deparmentName'], ENT_QUOTES, 'UTF-8');
            foreach($programs as $program){
                if($program['deparmentName'] == $deparmentName){
                    $programOption .= '<option value="' . htmlspecialchars($program['programName'], ENT_QUOTES, 'UTF-8') . '">' 
                    . htmlspecialchars($program['programName'], ENT_QUOTES, 'UTF-8') . '</option>';
            }
        }

        echo $programOption;
    }
?>
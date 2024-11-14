<?php

    function readCsv($filename){
        $rows = [];

        if(($handle = fopen($filename,'r')) !== FALSE){
            $header = fgetcsv($handle);
            while(($row = fgetcsv($handle)) !== FALSE){
                $rows[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $rows;
    }

    function getAge($birthdate){
       
        $reformattedDate = DateTime::createFromFormat('Y-d-m', $birthdate)->format('Y-m-d');

        $birthDateObj = new DateTime($reformattedDate);
        $currentDateObj = new DateTime();

        $ageInterval = $currentDateObj->diff($birthDateObj);

        $age = $ageInterval->y;
        return $age;
    }

    function getSchoolYear($graduationDate) {
        $graduationDateObj = new DateTime($graduationDate);
    
        $graduationYear = $graduationDateObj->format('Y');  

        if ($graduationDateObj->format('m') >= 6) {
         
            $schoolYearStart = $graduationYear - 1;  
            $schoolYearEnd = $graduationYear;       
        } else {
           
            $schoolYearStart = $graduationYear - 2;  
            $schoolYearEnd = $graduationYear - 1;   
        }
    
        return $schoolYearStart . '-' . $schoolYearEnd;
    }
?>
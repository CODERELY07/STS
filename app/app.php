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
?>
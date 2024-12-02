<?php

    //ends the session and redirects to the login page.
    session_start();     
    unset($_SESSION);  
    session_destroy();       
    header("Location:/login"); 
    exit();   
?>
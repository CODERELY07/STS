<?php

//logout admin 
session_start();
unset($_SESSION);
session_destroy();
header('Location: /adminLogin');
exit(); 

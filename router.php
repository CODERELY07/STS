<?php

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);


$routes = [
    '/' =>  'controllers/index.php',
    '/login' => 'controllers/login.php',
    '/register' => 'controllers/register.php',
    '/registered' => 'controllers/registered.php',
    '/pdf' => 'views/partials/pdf.php',
    '/student' => 'controllers/Admin/adminviewstudent.php',
    '/instructor' => 'controllers/Admin/adminviewinstructor.php',
    '/editStatus' => 'controllers/Admin/loads/editStatus.php',
    '/delete_enrolled' => 'controllers/Admin/loads/delete_enrolled.php',
    '/add-student' => 'controllers/Admin/loads/add.php',
    '/adminLogin' => 'controllers/Admin/adminLogin.php',
    '/admin-login-action' => 'controllers/Admin/loads/admin-login-action.php',
    '/admindashboard' => 'controllers/Admin/admindashboard.php',
    '/createAccount' => 'controllers/createAccount.php',
    '/send_email' => 'controllers/Admin/loads/send_email.php',
    '/fetch-instructors' => 'controllers/Admin/loads/fetch.php',
    '/add-instructor' => 'controllers/Admin/loads/add.php',
    '/edit-instructor' => 'controllers/Admin/loads/edit.php',
    '/delete-instructor' => 'controllers/Admin/loads/delete.php',
];

function routeToController($uri, $routes){
    if(array_key_exists($uri, $routes)){
        require $routes[$uri];
    }else{
        abort();
    }
}

function abort($code = 404){
    http_response_code($code);
    
    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);
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
    '/fetch-student' => 'controllers/Admin/loads/fetch.php',
    '/editStatus' => 'controllers/Admin/loads//editStatus.php',
    '/add-student' => 'controllers/Admin/loads/add.php',
    '/adminLogin' => 'controllers/Admin/adminLogin.php',
    '/admin-login-action' => 'controllers/Admin/loads/admin-login-action.php',
    '/admindashboard' => 'controllers/Admin/admindashboard.php',
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
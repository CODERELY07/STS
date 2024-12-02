<?php

//handles routing by mapping URLs to their corresponding controller files

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

$routes = [
    '/'                          => 'controllers/index.php',
    '/login'                     => 'controllers/login.php',
    '/logout'                    => 'logout.php',
    '/register'                  => 'controllers/register.php',
    '/registered'                => 'controllers/registered.php',
    '/pdf'                       => 'views/partials/pdf.php',
    '/student'                   => 'controllers/Admin/adminviewstudent.php',
    '/instructor'                => 'controllers/Admin/adminviewinstructor.php',
    '/editStatus'                => 'controllers/Admin/loads/editStatus.php',
    '/delete_enrolled'           => 'controllers/Admin/loads/delete_enrolled.php',
    '/add-student'               => 'controllers/Admin/loads/add.php',
    '/editStudPersonalInfo'      => 'controllers/Student/loads/editStudPersonalInfo.php',
    '/adminLogin'                => 'controllers/Admin/adminLogin.php',
    '/adminLogout'               => 'controllers/Admin/adminLogout.php',
    '/createAdmin'               => 'controllers/Admin/createAdmin.php',
    '/admin-login-action'        => 'controllers/Admin/loads/admin-login-action.php',
    '/admindashboard'            => 'controllers/Admin/admindashboard.php',
    '/studentdashboard'          => 'controllers/Student/studentdashboard.php',
    '/editProfile'               => 'controllers/Student/editProfile.php',
    '/createAccount'             => 'controllers/createAccount.php',
    '/send_email'                => 'controllers/Admin/loads/send_email.php',
    '/fetch-instructors'         => 'controllers/Admin/loads/fetch.php',
    '/add-instructor'            => 'controllers/Admin/loads/add.php',
    '/edit-instructor'           => 'controllers/Admin/loads/edit.php',
    '/delete-instructor'         => 'controllers/Admin/loads/delete.php',
    '/home'                      => 'controllers/index.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);
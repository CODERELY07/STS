<?php

    require 'config/config.php';
    require 'partials/head.php';
?>

<body>
<?php   require 'partials/register-header.php';?>
<div class="container-fluid">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6 mt-5">
                <h2 class="text-center display-5">Login</h2>
                <form id="login-form">
                    <div class="form-group my-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username">
                    </div>
                    <p class="error-message" id="username_error"></p>
                    <div class="form-group my-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <p class="error-message" id="password_error"></p>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <p class="p-2 text-center text-secondary">Back to home page <a href="/home">here</a>.</p>
            </div>
        </div>
    </div>
</div>

<?php
    require 'partials/footer.php';
?>

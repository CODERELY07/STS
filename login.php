<?php
    session_start();
    if(isset($_SESSION['token'])){
        header("Location: ./Instructors/dashboard.php");
        exit;
    }
    require './database/config.php';
    require './partials/head.php';
?>

<body>
<div class="container-fluid">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-6 mt-5">
                <h2 class="text-center">Login</h2>
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
                <p class="text-center mt-2"><a href="#">Forgot your password?</a></p>
            </div>
        </div>
    </div>
</div>

<?php
    require './partials/footer.php';
?>

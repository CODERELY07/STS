<?php 
    require_once 'config/config.php';
       require_once 'partials/admin-header.php';
    ?>
    <div class="wrapper">
        <?php 
            require_once 'partials/admin-aside.php';
        ?>
        <div class="main">
            <?php 
                require_once 'partials/admin-nav.php';
            ?>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Admin Dashboard</h4>
                        <h5>Welcome Back, Admin</h5>
                    </div>
                    <div class="row">
                        <a href="/student"  class="col-12 pe-auto col-md-5 d-flex pointer">
                            <div class="card flex-fill border-0">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12 p-2">
                                            <div class=" m-1">
                                                <h4>Students</h4>
                                                <p class="mb-0">All students</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                      
                      
                        <a href="/instructor"  class="col-12 pe-auto col-md-5 d-flex pointer">
                            <div class="card flex-fill border-0">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12 p-2">
                                            <div class=" m-1">
                                                <h4>Instructors</h4>
                                                <p class="mb-0">All Instructors</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                              Students Details
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                Number of students (pass,enrolled and fail)
                            </h6>
                            <div class="row">
                                <div class="col-12 col-md-6 d-flex mt-3">
                                    <div class="card flex-fill border-0">
                                        <div class="card-body p-0 d-flex flex-fill">
                                            <div class="row g-0 w-100">
                                                <div class="col-12 p-2">
                                                    <div class=" m-1">
                                                        <h4>Pass</h4>
                                                        <p class="mb-0 display-3">
                                                      <?php
                                                        $sql = "SELECT * FROM students WHERE status = 'pass'";
                                                        $stmt = $pdo->query($sql);
                                                        echo $stmt->rowCount();
                                                        ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex mt-3">
                                    <div class="card flex-fill border-0">
                                        <div class="card-body p-0 d-flex flex-fill">
                                            <div class="row g-0 w-100">
                                                <div class="col-12 p-2">
                                                    <div class=" m-1">
                                                    <h4>Failed</h4>
                                                        <p class="mb-0 display-3">
                                                      <?php
                                                        $sql = "SELECT * FROM students WHERE status = 'fail'";
                                                        $stmt = $pdo->query($sql);
                                                        echo $stmt->rowCount();
                                                        ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex mt-3">
                                    <div class="card flex-fill border-0">
                                        <div class="card-body p-0 d-flex flex-fill">
                                            <div class="row g-0 w-100">
                                                <div class="col-12 p-2">
                                                    <div class=" m-1">
                                                    <h4>Enrolled</h4>
                                                        <p class="mb-0 display-3">
                                                      <?php
                                                        $sql = "SELECT * FROM students WHERE status = 'enrolled'";
                                                        $stmt = $pdo->query($sql);
                                                        echo $stmt->rowCount();
                                                        ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </main>
            <?php 
            require_once 'partials/admin-footer.php';
        ?>
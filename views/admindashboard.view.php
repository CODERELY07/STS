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
                        <div class="col-12 col-md-6 d-flex">
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
                        </div>
                        <div class="col-12 col-md-6 d-flex">
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
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Enrolled Students
                            </h5>
                            <h6 class="card-subtitle text-muted">
                                All the students that's enrolled
                            </h6>
                        </div>
                    </div>
                </div>
            </main>
            <?php 
            require_once 'partials/admin-footer.php';
        ?>
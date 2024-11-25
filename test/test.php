<?php
    require '../config/config.php';
    require '../views/partials/head.php';
?>
<body>
    <div class="banner align-items-center justify-content-center text-center text-white py-5">
        <div class="overlay fixed-top">
            <?php
                require '../views/partials/header.php';
            ?>
            <div style="position:absolute;left:0;z-index:100;top:50%;width: 300px; height: 10px;">
            </div>
    <section class="hero-section d-flex justify-content-center align-items-center">
        <div class="container d-flex flex-column gap-5">
            <h2>STUDENT MANAGEMENT SYSTEM</h2>
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <h1>EFFORTLESS LEARNING<br>SEAMLESS TEACHING</h1>
                    </div>
                    <div class="carousel-item">
                        <h1>JOIN US ON THE JOURNEY<br>OF ACADEMIC SUCCESS</h1>
                    </div>
                    <div class="carousel-item">
                        <h1>STREAMLINING ADMINISTRATIVE<br>TASKS FOR EDUCATORS</h1>
                    </div>
                </div>

            </div>
            <div>
                <a href="/register" class="btn btn-outline-light">REGISTER</a>
                <a href="/login" class="btn btn-outline-light signin">SIGN IN</a>
            </div>
        </div>
    </section>


            </div>

    </div>
     

    </div>
    <section class="info-section">
        <div class="container">
            <p>Designed to enhance the educational experience for both students and educators.<br>It’s a comprehensive management system that streamlines administrative tasks. Join us on the journey of the academic success!</p>
            <div class="row">
                <div class="col-md-2 offset-md-1">
                    <div class="icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="icon-text">Course</div>
                </div>
                <div class="col-md-2">
                    <div class="icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="icon-text">Highlights</div>
                </div>
                <div class="col-md-2">
                    <div class="icon">
                        <i class="fas fa-school"></i>
                    </div>
                    <div class="icon-text">School</div>
                </div>
                <div class="col-md-2">
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="icon-text">Library</div>
                </div>
                <div class="col-md-2">
                    <div class="icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="icon-text">Certificate</div>
                </div>
            </div>
        </div>
    </section>
    <div class="container my-5">
        <h2 class="text-center">Enroll Now for an Exciting Academic Journey!</h2>
        <p class="text-center">Don’t miss your chance to join XSchool! Enrollment is open until January 15, 2024, with exams scheduled for February 10, 2024. Secure your spot today and embark on a path to academic success!</p>
        <div class="text-center">
            <a href="/register">
                <button class="button">
                    Enroll Now
                    <i class="fas fa-arrow-right"></i>
                </button>
            </a>
          
        </div>
    </div>
    
    <div class="line"></div>
    <div class="container-fluid my-5">
        <h3 class="text-center my-4 pb-5">View Courses!</h3>
        <div class="d-flex">
            <div class="box">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-container">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyPAnt5l_TZaAT21US_U0S5Q-VBky0mO0D5g&s" class="profile-img">
                        </div>
                        <h5 class="card-title mt-3 white">Course Title 1</h5>
                        <p class="card-text white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, odio excepturi voluptatem quaerat accusantium suscipit placeat labore? Qui temporibus, ipsum dolore quod autem illo optio porro, perspiciatis necessitatibus soluta voluptate blanditiis nam hic harum. Dolore molestias omnis, quos sed harum mollitia excepturi magni quidem hic suscipit explicabo perferendis. Accusantium nisi, ex molestias alias repudiandae delectus velit quidem magnam dignissimos. Molestiae maiores iure commodi perspiciatis quas rem quidem eum reprehenderit! Molestiae odit voluptate, delectus velit rem consequuntur libero ipsum minus voluptatibus itaque sequi! Repudiandae iusto voluptas iure animi blanditiis temporibus sapiente harum quisquam ducimus repellendus! Vel, ducimus! Odio quis cupiditate minus?</p>
                        <a href="#" class="btn btn-primary">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-container">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyPAnt5l_TZaAT21US_U0S5Q-VBky0mO0D5g&s" class="profile-img">
                        </div>
                        <h5 class="card-title mt-3 white">Course Title 1</h5>
                        <p class="card-text white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, odio excepturi voluptatem quaerat accusantium suscipit placeat labore? Qui temporibus, ipsum dolore quod autem illo optio porro, perspiciatis necessitatibus soluta voluptate blanditiis nam hic harum. Dolore molestias omnis, quos sed harum mollitia excepturi magni quidem hic suscipit explicabo perferendis. Accusantium nisi, ex molestias alias repudiandae delectus velit quidem magnam dignissimos. Molestiae maiores iure commodi perspiciatis quas rem quidem eum reprehenderit! Molestiae odit voluptate, delectus velit rem consequuntur libero ipsum minus voluptatibus itaque sequi! Repudiandae iusto voluptas iure animi blanditiis temporibus sapiente harum quisquam ducimus repellendus! Vel, ducimus! Odio quis cupiditate minus?</p>
                        <a href="#" class="btn btn-primary">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-container">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyPAnt5l_TZaAT21US_U0S5Q-VBky0mO0D5g&s" class="profile-img">
                        </div>
                        <h5 class="card-title mt-3 white">Course Title 1</h5>
                        <p class="card-text white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, odio excepturi voluptatem quaerat accusantium suscipit placeat labore? Qui temporibus, ipsum dolore quod autem illo optio porro, perspiciatis necessitatibus soluta voluptate blanditiis nam hic harum. Dolore molestias omnis, quos sed harum mollitia excepturi magni quidem hic suscipit explicabo perferendis. Accusantium nisi, ex molestias alias repudiandae delectus velit quidem magnam dignissimos. Molestiae maiores iure commodi perspiciatis quas rem quidem eum reprehenderit! Molestiae odit voluptate, delectus velit rem consequuntur libero ipsum minus voluptatibus itaque sequi! Repudiandae iusto voluptas iure animi blanditiis temporibus sapiente harum quisquam ducimus repellendus! Vel, ducimus! Odio quis cupiditate minus?</p>
                        <a href="#" class="btn btn-primary">Enroll now</a>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-container">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyPAnt5l_TZaAT21US_U0S5Q-VBky0mO0D5g&s" class="profile-img">
                        </div>
                        <h5 class="card-title white mt-3">Course Title 1</h5>
                        <p class="card-text white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut, odio excepturi voluptatem quaerat accusantium suscipit placeat labore? Qui temporibus, ipsum dolore quod autem illo optio porro, perspiciatis necessitatibus soluta voluptate blanditiis nam hic harum. Dolore molestias omnis, quos sed harum mollitia excepturi magni quidem hic suscipit explicabo perferendis. Accusantium nisi, ex molestias alias repudiandae delectus velit quidem magnam dignissimos. Molestiae maiores iure commodi perspiciatis quas rem quidem eum reprehenderit! Molestiae odit voluptate, delectus velit rem consequuntur libero ipsum minus voluptatibus itaque sequi! Repudiandae iusto voluptas iure animi blanditiis temporibus sapiente harum quisquam ducimus repellendus! Vel, ducimus! Odio quis cupiditate minus?</p>
                        <a href="#" class="btn btn-primary">Enroll now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="/adminLogin">Employee</a>
<?php
    require '../views/partials/footer.php';

?>

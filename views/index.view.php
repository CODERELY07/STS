<?php
    require 'config/config.php';
    require 'partials/head.php';
?>
<body>
    <div class="banner align-items-center justify-content-center text-center text-white py-5" style="background-image: url('https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTExL2ZsNDg0NjUxOTQ2MzEtaW1hZ2UuanBn.jpg');">
        <div class="overlay">
            <?php
                require 'partials/header.php';
            ?>
                            <div style="position:absolute;left:0;z-index:100;top:50%;width: 300px; height: 10px;">
                            </div>
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <p style="position: absolute; top: 40%; left: 50%; transform: translate(-50%, -50%);z-index:10">STUDENT MANAGEMENT SYSTEM</p>

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>

                <div class="carousel-inner">
                    <!-- Corrected the extra carousel-inner -->
                     
                    <div class="carousel-item active" style="background-color: rgba(52, 58, 64, 0.3); height: 100vh;">
                        <div class="carousel-caption d-flex justify-content-center align-items-center d-md-block w-100" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                                
                                <h5 style="color: white;">First slide label</h5>
                                <p style="color: white;">Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-color: rgba(52, 58, 64, 0.3); height: 100vh;">
                        <div class="carousel-caption d-flex justify-content-center align-items-center d-md-block w-100" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                                <h5 style="color: white;">Second slide label</h5>
                                <p style="color: white;">Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="background-color: rgba(52, 58, 64, 0.3); height: 100vh;">
                        <div class="carousel-caption d-flex justify-content-center align-items-center d-md-block w-100" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                                <h5 style="color: white;">Third slide label</h5>
                                <p style="color: white;">Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <a href="/login">
                <button class="Btn">
                    <div class="sign"><i class="fa-solid fa-right-to-bracket"></i></div>
                    <div class="text">Login</div>
                </button>
            </a>
    </div>

        </div>
     

    </div>
    
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
    require 'partials/footer.php';

?>

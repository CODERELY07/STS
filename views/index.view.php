<?php
    require 'config/config.php';
    require 'partials/head.php';

    $sql = "SELECT * FROM program WHERE popular = 1";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
    <div class="banner align-items-center justify-content-center text-center text-white py-5">
        <div class="overlay fixed-top">
            <?php
                require 'partials/header.php';
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
    <div class="h-line"></div>
    <div class="container">
        <div class="heads d-flex align-items-center justify-content-center gap-3">
            <img alt="Logo"  style="width:100px"  src="../src/images/logoshadow.png"/>
            <h5>
                FEATURED PROGRAM
            </h5>
        </div>
        <div class="row mt-4">
            <?php foreach($rows as $row): ?>
                <div class="col-md-4 mb-4">
                    <div class="course-card">
                        <div class="overlay-hover">
                            <p class="text-center color-main">
                                <?= $row["ProgramDescription"] ?>
                            </p>
                        </div>
                        <img width="100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQg5HJ_Bbmk5B2a4gCG8KAZHiCHzzPkGwrRuA&s"/>
                        <div class="course-title-overlay">
                            <?=  htmlspecialchars($row['ProgramAbbr']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div class="h-line"></div>
    <div class="container my-5">
   <div class="heads">
   <div class="heads d-flex align-items-center justify-content-center gap-3">
            <img alt="Logo" style="width:100px" src="../src/images/logoshadow.png"/>
            <h5>
            XSCHOOL HIGHLIGHTS
            </h5>
        </div>
    <h2>
    
    </h2>
    <p>
     Get a sense of the learning community and culture at xSchool. Our students, educators, administrators, and parents share their xSchool experiences.
    </p>
   </div>
   <div class="row">
    <div class="col-md-4">
     <div class="card-highlights">
      <img alt="Group of graduates celebrating" height="200" src="https://images.pexels.com/photos/5227311/pexels-photo-5227311.jpeg" width="300"/>
      <div class="card-highlights-body">
       <div class="icon">
        <i class="fas fa-graduation-cap">
        </i>
       </div>
       <h5>
        THE FUTURE
       </h5>
       <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-4">
     <div class="card-highlights">
      <img alt="Football players in action" height="200" src="https://images.pexels.com/photos/1618200/pexels-photo-1618200.jpeg" width="300"/>
      <div class="card-highlights-body">
       <div class="icon">
        <i class="fas fa-football-ball">
        </i>
       </div>
       <h5>
        SPORT
       </h5>
       <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
       </p>
      </div>
     </div>
    </div>
    <div class="col-md-4">
     <div class="card-highlights">
      <img alt="People dancing at a party" height="200" src="https://live.staticflickr.com/4455/37451703790_5b8cf2f98a_b.jpg" width="300"/>
      <div class="card-highlights-body">
       <div class="icon">
        <i class="fas fa-cocktail">
        </i>
       </div>
       <h5>
        DANCE THE NIGHT
       </h5>
       <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
       </p>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div  class="bg-main border d-flex align-items-center justify-content-center" style="width:100%;height:300px">
    <p class="text-center text-white p-5">Designed to enhance the educational experience for both students and educators.<br>It’s a comprehensive management system that streamlines administrative tasks. Join us on the journey of the academic success!</p>
  </div>
  <footer class="pt-4 m-0">
    <div class="heads d-flex align-items-center justify-content-center gap-3">
        <img alt="Logo"  style="width:100px"  src="../src/images/logoshadow.png"/>
        <h5>
            SMS
        </h5>
    </div>
    <div>
        <ul class="d-flex align-items-center justify-content-center gap-5">
            <li class="mx-3" class="mx-3"><a class="color-main text-decoration-none" href="" >HOME</a></li>
            <li class="mx-3"><a class="color-main text-decoration-none" href="" >ABOUT</a></li>
            <li class="mx-3"><a  class="color-main text-decoration-none" href="/adminLogin" >Employee</a></li>
            <li class="mx-3"><a class="color-main text-decoration-none" href="" >FAQ</a></li>
            <li class="mx-3"><a class="color-main text-decoration-none" href="" >HIGHLIGHTS</a></li>
        </ul>
    </div>
    <div class="socials">
        <ul class="d-flex align-items-center justify-content-center gap-5">
            <li class="mx-3"><a class="color-main" href=""><i class="fa-brands fa-instagram"></i></a></li>
            <li class="mx-3"><a class="color-main" href=""><i class="fa-brands fa-facebook-f"></i></a></li>
            <li class="mx-3"><a class="color-main" href=""><i class="fa-brands fa-twitter"></i></a></li>
        </ul>
    </div>
    <div class="bg-main">
        <p class="text-center text-white p-2">All Rights Reserved</p>
    </div>
  </footer>
  <script src="./../js/effects.js?<?php echo time()?>"></script>
<?php
    require 'partials/footer.php';

?>

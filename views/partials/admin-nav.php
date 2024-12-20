<!-- This navbar displays a user profile icon with a dropdown menu
     Admins see a logout option, while students can edit their profile or log out. -->

     <nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse navbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzewQ_JGAS5FVP6PWfoTSzZ9TnNJWuMJFfLg&s" class="avatar img-fluid rounded" alt="">
                </a>
                <?php if ($role == 'admin'): ?>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="/adminLogout" class="dropdown-item">Logout</a>
                    </div>
                <?php elseif ($role == 'student'): ?>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="/editProfile" class="dropdown-item">Edit Profile</a>
                        <a href="/logout" class="dropdown-item">Logout</a>
                    </div>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</nav>

<?php if($role == 'admin'):?>
<aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100 mt-5 pt-4">
            <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
                <div class="sidebar-logo">
                    <a href="#">STS</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Admin Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="/admindashboard" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines p-2"></i>
                            Users
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/student" class="sidebar-link">Student</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/instructor" class="sidebar-link">Instructor</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
<?php endif?>
<?php if($role == 'student'):?>
<aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100 mt-5 pt-4">
            <a href="#" class="theme-toggle">
            <i class="fa-regular fa-moon"></i>
            <i class="fa-regular fa-sun"></i>
        </a>
                <div class="sidebar-logo">
                    <a href="#">STS</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Student Elements
                    </li>
                    <li class="sidebar-item">
                        <a href="/studentdashboard" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines p-2"></i>
                            Users
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="/student" class="sidebar-link">Student</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="/instructor" class="sidebar-link">Instructor</a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </aside>
<?php endif?>
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
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines p-2"></i>
                            Subjects
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <?php 

                            require_once(__DIR__ . '/../../paths.php');
                            require_once CONFIG_PATH . 'config.php';
                            $userID = $_SESSION['user_id'];
                            $sql_student = "SELECT program FROM students WHERE userID = :userID";
                            $stmt_student = $pdo->prepare($sql_student);
                            $stmt_student->bindParam(':userID', $userID);
                            $stmt_student->execute();
                            $programName = $stmt_student->fetchColumn();

                            $sql_program = "SELECT ProgramID FROM program WHERE ProgramName = :programName";
                            $stmt_program = $pdo->prepare($sql_program);
                            $stmt_program->bindParam(':programName', $programName);
                            $stmt_program->execute();
                            $programID = $stmt_program->fetchColumn();


                            $sql_course = "SELECT * FROM courses WHERE ProgramID = :programID";
                            $stmt_course = $pdo->prepare($sql_course);
                            $stmt_course->bindParam(':programID', $programID);
                            $stmt_course->execute();
                            $rows = $stmt_course->fetchAll(PDO::FETCH_ASSOC);



                            foreach($rows as $row):?>
                            <li class="sidebar-item">
                                <a href="/studentdashboard" class="sidebar-link">
                                <?=$row['CourseName'];?>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                  
                </ul>
            </div>
        </aside>
<?php endif?>
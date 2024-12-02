<!-- This code is for future purposes -->
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="sidebar">
                <h3>Instructor Dashboard</h3>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="courses.php">Courses</a></li>
                    <li><a href="students.php">Students</a></li>
                    <li><a href="assignments.php">Assignments</a></li>
                    <li><a href="settings.php">Settings</a></li>
                    <li><a href="./../logout.php">Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
            <h4>Welcome to your Dashboard, Instructor</h4>

            <?php
                
                $instructor_id = 1; 
                
                // Prepare the SQL query
                $stmt = $pdo->prepare("SELECT * FROM instructors WHERE id = :instructor_id");
                $stmt->bindParam(':instructor_id', $instructor_id, PDO::PARAM_INT);
                $stmt->execute();
                
                $instructor = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($instructor) {
                    echo "<h5>Instructor: " . htmlspecialchars($instructor['name']) . "</h5>";
                    echo "<p>Email: " . htmlspecialchars($instructor['email']) . "</p>";
                } else {
                    echo "<p>Instructor details not found.</p>";
                }

                // Fetch the courses assigned to the instructor
                $stmt_courses = $pdo->prepare("SELECT * FROM courses WHERE instructor_id = :instructor_id");
                $stmt_courses->bindParam(':instructor_id', $instructor_id, PDO::PARAM_INT);
                $stmt_courses->execute();
                
                $courses = $stmt_courses->fetchAll(PDO::FETCH_ASSOC);
                
                if ($courses) {
                    echo "<h4>Your Courses</h4>";
                    echo "<ul>";
                    foreach ($courses as $course) {
                        echo "<li><a href='course_details.php?id=" . $course['id'] . "'>" . htmlspecialchars($course['course_name']) . "</a></li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No courses found.</p>";
                }
            ?>
        </div>
    </div>
</div>

<?php
    require '.././partials/footer.php';  
?>

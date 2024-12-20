<?php 
    // Include necessary configuration and header files
    require_once 'config/config.php';
    require_once 'partials/admin-header.php';
?>

<div class="wrapper">
    <?php 
        // Include sidebar for admin navigation
        require_once 'partials/admin-aside.php';
    ?>
    <div class="main">
        <?php 
            // Include admin navigation bar
            require_once 'partials/admin-nav.php';
        ?>

        <?php if (isset($_SESSION['message'])): ?> 
            <!-- Display session message if it exists -->
            <div class="alert alert-info text-center" role="alert" id="alertMessage">
                <?= $_SESSION['message']; ?>
            </div>
            <script>
                // Hide the alert after 5 seconds
                setTimeout(function() {
                    var alert = document.getElementById('alertMessage');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 5000); 
            </script>
        <?php endif; unset($_SESSION['message']); ?>

        <!-- Modal for adding an instructor -->
        <div class="modal fade" id="addInstructor" tabindex="-1" role="dialog" aria-labelledby="addInstructorLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInstructorLabel">Add Instructor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for adding an instructor -->
                        <form id="addInstructorForm" method="POST">
                            <label for="firstname">First Name: </label>
                            <input type="text" name="firstname" id="firstname" class="form-control" 
                                value="<?php echo isset($firstname) ? htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <?php if (isset($errors['firstname'])): ?>
                                <div class="text-danger"><?php echo htmlspecialchars($errors['firstname'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php endif; ?>

                            <label for="middlename">Middle Name: </label>
                            <input type="text" name="middlename" id="middlename" class="form-control" 
                                value="<?php echo isset($middlename) ? htmlspecialchars($middlename, ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <?php if (isset($errors['middlename'])): ?>
                                <div class="text-danger"><?php echo htmlspecialchars($errors['middlename'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php endif; ?>

                            <label for="lastname">Last Name: </label>
                            <input type="text" name="lastname" id="lastname" class="form-control" 
                                value="<?php echo isset($lastname) ? htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <?php if (isset($errors['lastname'])): ?>
                                <div class="text-danger"><?php echo htmlspecialchars($errors['lastname'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php endif; ?>

                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" class="form-control" 
                                value="<?php echo isset($email) ? htmlspecialchars($email, ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <?php if (isset($errors['email'])): ?>
                                <div class="text-danger"><?php echo htmlspecialchars($errors['email'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php endif; ?>

                            <label for="phone">Phone: </label>
                            <input type="text" name="phone" id="phone" class="form-control" 
                                value="<?php echo isset($phone) ? htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') : ''; ?>">
                            <?php if (isset($errors['phone'])): ?>
                                <div class="text-danger"><?php echo htmlspecialchars($errors['phone'], ENT_QUOTES, 'UTF-8'); ?></div>
                            <?php endif; ?>

                            <!-- Submit button to add instructor -->
                            <button type="submit" name="btn_add" class="btn btn-primary float-end mt-3">Add</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                    </div>
                </div>
            </div>
        </div>

        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="mb-3">
                    <h4>Instructors</h4>
                </div>
                <div class="card p-4">
                    <div class="row">
                        <p class="col-6">Click Add Icon to add Instructors</p>
                        <!-- Button to trigger the modal for adding instructor -->
                        <button type="button" class="btn col-6 btn-primary" data-toggle="modal" data-target="#addInstructor">+</button>
                    </div>
                </div>
                
                <!-- Section to display list of instructors -->
                <div class="card">
                    <h3></h3>
                    <div id="live_load"></div> <!-- This will be dynamically populated with instructor data -->
                </div>
            </div>
        </main>

        <!-- jQuery for handling dynamic updates -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Bootstrap JS for modal functionality -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- JavaScript to load and update instructor data -->
        <script>
            $(document).ready(function() {
                // Function to fetch and display instructor data
                function fetch_data() {
                    $.ajax({
                        type: "POST",
                        url: "/fetch-instructors", 
                        success: function(data) {
                            $('#live_load').html(data); // Display the data in live_load div
                        }
                    });
                }

                fetch_data(); // Initial data fetch on page load

                // Function to edit data for a specific instructor
                function editData(id, text, columnname) {
                    $.ajax({
                        type: 'POST',
                        url: '/edit-instructor', 
                        data: {id: id, text: text, columnname: columnname},
                        success: function(data) {
                            alert(data);
                        }
                    });
                }

                // Edit instructor data when user clicks and blurs input fields
                function editDataByColumns($id, $elementclass, $column) {
                    $(document).on('blur', '.' + $elementclass, function() {
                        let id = $(this).data($id);
                        let firstname = $(this).text(); // Get updated value
                        editData(id, firstname, $column); // Send the updated data
                    });
                }

                // Apply editing functionality to specific columns
                editDataByColumns('id1', 'firstnameedit', 'FirstName');
                editDataByColumns('id2', 'middlenameedit', 'MiddleName');
                editDataByColumns('id3', 'lastnameedit', 'LastName');
                editDataByColumns('id4', 'emailedit', 'Email');
                editDataByColumns('id5', 'phoneedit', 'Phone');

                // Handle form submission for adding a new instructor
                $('#addInstructorForm').on('submit', function(e) {
                    e.preventDefault(); // Prevent default form submission
                    let formData = new FormData(this); // Collect form data

                    $.ajax({
                        type: 'POST',
                        url: '/add-instructor',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            alert(data);
                            fetch_data(); 
                            $('#addInstructorForm')[0].reset(); // Reset the form
                        }
                    });
                });

                // Handle instructor deletion
                $(document).on('click', '.btn_delete', function() {
                    let id = $(this).data('id2');
                    if (confirm("Are you sure you want to delete this?")) {
                        $.ajax({
                            type: "POST",
                            url: '/delete-instructor', 
                            data: {id: id},
                            success: function(data) {
                                alert(data); 
                                fetch_data(); // Reload instructor data
                            }
                        });
                    }
                });
            });
        </script>

    </div>
</div>

<?php 
    // Include footer for the admin panel
    require_once 'partials/admin-footer.php';
?>

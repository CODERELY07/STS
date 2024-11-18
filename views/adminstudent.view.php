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
         <!-- Edit Status Modal -->
        <div class="modal fade" id="editStatus" tabindex="-1" role="dialog" aria-labelledby="editStatusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editStatusLabel">Edit Status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/editStatus" method="POST">
                            <div class="form-group">
                                <label for="editStatus">Status</label>
                                <select class="form-control" id="editStatus" name="editStatus">
                                    <option value=""></option>
                                    <option value="pass">Pass</option>
                                    <option value="fail">Fail</option>
                                </select>
                            </div>
                            <!-- Hidden input to store the student ID -->
                            <input type="hidden" id="editStudentId" name="editStudentId">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Students Informations</h4>
                        <h5>All Students</h5>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-12 p-2">
                                            <div class=" m-1">
                                                <h4>Registered Students</h4>
                                                <p class="mb-0">All students to take exams</p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-fixed">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $sql_register = "SELECT * FROM students WHERE status = 'registered' ORDER BY id DESC";
                                                        $stmt = $pdo->query($sql_register);
                                                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <tbody>
                                                        <?php foreach($rows as $row):?>
                                                            <tr>
                                                                <td scope="row"><?= $row['firstname']. ' ' . $row['middlename'] . ' ' . $row['lastname']?></td>
                                                                <td><?= $row['email']?></td>
                                                                <td><?= $row['address']?></td>
                                                              <!-- Table Row with "Edit Status" Button -->
                                                            <td>
                                                                <!-- Add a data-id attribute to store the student ID -->
                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editStatus" data-id="<?= $row['id']; ?>">
                                                                    Edit Status
                                                                </button>
                                                            </td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
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
                                                <h4>Taked Exams</h4>
                                                <p class="mb-0">All students that takes the exams</p>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-fixed">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Address</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                        $sql_register = "SELECT * FROM students WHERE status = 'pass' || status='fail' ORDER BY id DESC";
                                                        $stmt = $pdo->query($sql_register);
                                                        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                    ?>
                                                    <tbody>
                                                        <?php foreach($rows as $row):?>
                                                            <tr>
                                                                <td scope="row"><?= $row['firstname']. ' ' . $row['middlename'] . ' ' . $row['lastname']?></td>
                                                                <td><?= $row['email']?></td>
                                                                <td><?= $row['address']?></td>
                                                                <td><?= $row['status']?></td>
                                                                <td><button class="btn"><a href="#">Send Message</a></button></td>
                                                            </tr>
                                                        <?php endforeach;?>
                                                    </tbody>
                                                </table>
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
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            $(document).ready(function() {
                // When the Edit Status button is clicked, open the modal
                $('#editStatus').on('show.bs.modal', function(event) {
                    // Get the button that triggered the modal
                    var button = $(event.relatedTarget);
                    // Get the student ID from the data-id attribute
                    var studentId = button.data('id');
                    
                    // Set the student ID in the hidden input field of the modal
                    var modal = $(this);
                    modal.find('#editStudentId').val(studentId);
                });
            });


        </script>

            <?php 
            require_once 'partials/admin-footer.php';
        ?>
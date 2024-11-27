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
          <?php if(isset($_SESSION['message'])): ?> 
            <div class="alert alert-info text-center" role="alert" id="alertMessage">
                <?= $_SESSION['message']; ?>
            </div>
            <script>
                setTimeout(function() {
                var alert = document.getElementById('alertMessage');
                    if (alert) {
                        alert.style.display = 'none';
                    }
                }, 5000); 
            </script>
            <?php endif; unset($_SESSION['message']); ?>

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
                                    <option value="registered">Registered</option>
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
                        <div class="col-12 col-md-12 d-flex">
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
                                                            <td>
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
                        <div class="col-12 col-md-12 d-flex">
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
                                                            <th scope="col" class="text-center" colspan="3">Action</th>
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
                                                                <td>
                                                                    <form action="/send_email" method="POST">
                                                                        <input type="hidden" name="id" id="id" value="<?= $row['id']?>">
                                                                        <button type="submit" class="btn">Send Message</button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                <button type="button" class="btn btn-primary delete" data-id="<?= $row['id']; ?>">
                                                                    Delete
                                                                </button>
                                                                </td>
                                                                <td>
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
                                    $sql_register = "SELECT * FROM students WHERE status = 'enrolled' ORDER BY id DESC";
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
                                            <td>
                                               <button type="button" class="btn btn-primary delete" data-id="<?= $row['id']; ?>">
                                                Delete
                                                </button>

                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            $(document).ready(function() {

                $('#editStatus').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget);
                    var studentId = button.data('id');

                    var modal = $(this);
                    modal.find('#editStudentId').val(studentId);
                });
               
                $('.delete').on('click', function(e){
                    var id = $(this).data('id');
                    if(confirm("Are you sure you want to delete this? ")){
                    $.ajax({
                        type: "POST",
                        url: "/delete_enrolled",
                        data: {id: id},
                        success: function(data){
                            alert(data);
                            location.reload();
                        }
                    })
                 }
                })
            });


        </script>

            <?php 
            require_once 'partials/admin-footer.php';
        ?>
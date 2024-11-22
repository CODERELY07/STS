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
            <div class="modal fade" id="addInstructor" tabindex="-1" role="dialog" aria-labelledby="addInstructorLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInstructorLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addInstructorForm">
                            <label for="firstname">First Name: </label>
                            <input type="text" name="firstname" id="firstname" class="form-control">
                            <label for="middlename">Middle Name: </label>
                            <input type="text" name="middlename" id="middlename" class="form-control">
                            <label for="lastname">Last Name: </label>
                            <input type="text" name="lastname" id="lastname" class="form-control">
                            <label for="email">Email: </label>
                            <input type="email" name="email" id="email" class="form-control">
                            <label for="phone">Phone: </label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            <button type="submit" name="btn_add"
                            class="btn btn-xs btn-success float-end mt-3">Add</button>
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
                            <button type="button" class="btn col-6 btn-primary" data-toggle="modal" data-target="#addInstructor">+
                            </button>
                        </div>
                    </div>
                    
                    <!-- Table Element -->
                 
                        <div class="card">
                            <h3></h3>
                            <div id="live_load"></div>
                        </div>
                </div>
            </main>
            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <!-- Bootstrap JavaScript -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Load Data -->
            <script>
            $(document).ready(function(){
            function fetch_data(){
                $.ajax({
                    type: "POST",
                    url:"/fetch-instructors",
                    success:function(data){
                        $('#live_load').html(data);
                    }
                })
            }
            fetch_data();

            function editData(id, text, columnname){
                $.ajax({
                    type: 'POST',
                    url: '/edit-instructor',
                    data: {id:id, text:text, columnname:columnname},
                    success:function(data){
                        
                    }
                })
            }
            function editDataByColumns($id,$elementclass, $column){
                $(document).on('blur', '.' + $elementclass, function(){
                    let id = $(this).data($id);
                    let firstname = $(this).text();
                    editData(id,firstname, $column);
                });
            }

            editDataByColumns('id1','firstnameedit', 'FirstName');
            editDataByColumns('id2','middlenameedit', 'MiddleName');
            editDataByColumns('id3','lastnameedit', 'LastName');
            editDataByColumns('id4','emailedit', 'Email');
            editDataByColumns('id5','phoneedit', 'Phone');
        
            $('#addInstructorForm').on('submit', function(e){
                e.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    type:'POST',
                    url: '/add-instructor',
                    data: formData, 
                    processData: false, 
                    contentType: false, 
                    success:function(data){
                        alert(data); 
                        fetch_data(); 
                        $('#addInstructorForm')[0].reset();
                    }
                })
            });

            $(document).on('click', '.btn_delete', function(){
                let id = $(this).data('id2');
                console.log(id);
                    if(confirm("Are you sure you want to delete this? ")){
                        $.ajax({
                        type: "POST",
                        url: '/delete-instructor',
                        data: {id: id},
                        success: function(data){
                            alert(data);
                            fetch_data();
                        }
                    })
                }
            })
        })
            </script>

            <?php 
            require_once 'partials/admin-footer.php';
        ?>
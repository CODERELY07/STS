<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin-style.css">
</head>

<body>
    <div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm">
                        <label for="firstname">First Name: </label>
                        <input type="text" name="firstname" id="firstname" class="form-control">
                        <label for="middlename">Middle Name: </label>
                        <input type="text" name="middlename" id="middlename" class="form-control">
                        <label for="lastname">Last Name: </label>
                        <input type="text" name="lastname" id="lastname" class="form-control">
                        <label for="email">Email: </label>
                        <input type="text" name="email" id="email" class="form-control">
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
 <div class="wrapper">
        <?php 
            require_once 'partials/admin-aside.php';
        ?>
        <div class="main">
        <?php 
            require_once 'partials/admin-nav.php';
        ?>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Instructors</h4>
                    </div>
                    <div class="row">
                        <!-- <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Welcome Back, Admin</h4>
                                                <p class="mb-0">Admin Dashboard, CodzSword</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                $ 78.00
                                            </h4>
                                            <p class="mb-2">
                                                Total Earnings
                                            </p>
                                            <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    +9.0%
                                                </span>
                                                <span class="text-muted">
                                                    Since Last Month
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- Table Element -->
                    <div class="container">
                        <div class="card">
                            <h3></h3>
                            <div id="live_load"></div>
                        </div>
                    </div>
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
    <!-- Modal -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="js/admin-script.js"></script>
    <script>
        $(document).ready(function(){
            function fetch_data(){
                $.ajax({
                    type: "POST",
                    url:"/fetch-student",
                    success:function(data){
                        $('#live_load').html(data);
                    }
                })
            }

            function editData(id, text, columnname){
                $.ajax({
                    type: 'POST',
                    url: '/../loads/edit.php',
                    data: {id:id, text:text, columnname:columnname},
                    success:function(data){
                        alert(data);
                    }
                })
            }
            fetch_data();

            $('#addStudentForm').on('submit', function(e){
                e.preventDefault();
                let formData = new FormData(this);
                console.log(formData)

                $.ajax({
                    type:'POST',
                    url: '/add-student',
                    data: formData, 
                    processData: false, 
                    contentType: false, 
                    success:function(data){
                        alert(data);
                        fetch_data();
                    }
                })
            });

            $(document).on('blur', '.username', function(){
                let id = $(this).data('id1');
                let username = $(this).text();
                editData(id,username, "username");
            });

            $(document).on('click', '.btn_delete', function(){
                let id = $(this).data('id2');
                console.log(id);
                    if(confirm("Are you sure you want to delete this? ")){
                        $.ajax({
                        type: "POST",
                        url: '/../loads/delete.php',
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
  </body>
</html>
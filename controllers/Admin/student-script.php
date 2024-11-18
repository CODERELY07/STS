<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
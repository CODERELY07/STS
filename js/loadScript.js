// Updates the programs dropdown based on the selected department using AJAX.
$(document).ready(function(){

    $("#department").change(function(){
        var deparmentName = $(this).val();
        
        if(deparmentName){
            $.ajax({
                type:"GET",
                url: '../loads/load_programs.php',
                data: {deparmentName: deparmentName},
                success:function(data){
                   $('#program').html(data);
                   console.log(data);
                }
            })
        }else{
            $('#program').html('<option value="">Select Program</option>');
        }
    })

})
$(function(){
    $('#login-form').on('submit', function(e){
        e.preventDefault();

        let dataForm = $(this).serialize();
        let usernameError = $("#username_error");
        let passwordError = $("#password_error");
        $.ajax({
            type: "POST",
            url: "action.php",
            data: dataForm,
          
        }).then(function(res){
            let result = JSON.parse(res);
            // console.log(res);
            if(result.success){
                localStorage.setItem('token', result.token);
                location.href = "./Instructors/dashboard.php";
            }else{
                if(result.error.username){
                    console.log(result.error.username)
                    usernameError.text(result.error.username);
                }else{
                    usernameError.text("");
                }
    
                if(result.error.password){
                    passwordError.text(result.error.password);
                }else{
                    passwordError.text("");
                }    
            }
        }).fail(function(){
            passwordError.text("Sign In Error");
        })
    })
})
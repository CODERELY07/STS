$(function(){
    $('#login-form').on('submit', function(e){
        e.preventDefault();

        let dataForm = $(this).serialize();
        let usernameError = $("#username_error");
        let passwordError = $("#password_error");
        $.ajax({
            type: "POST",
            url: "loads/login_action.php",
            data: dataForm,
        }).then(function(res){
            let result = res;
            if(result.success){
                localStorage.setItem('token', result.token);
                location.href = '/studentdashboard';
            }else{
                if(result.error.username){
                    console.log(result.error.username);
                    usernameError.text(result.error.username);
                } else {
                    usernameError.text("");
                }
        
                if(result.error.password){
                    passwordError.text(result.error.password);
                } else {
                    passwordError.text("");
                }
            }
        }).fail(function(xhr, status, error){
            console.log("Error: " + error);  
            console.log("Status: " + status); 
            console.log("Response Text: " + xhr.responseText); 
            passwordError.text("Sign In Error");
        });
        
    })
});

// Check if email is valid on blur
function email(){
$('#email').on('blur', function() {
    var email = $(this).val();
    console.log(email);

    // Check if email is not empty
    if (email != '') {
        $.ajax({
            url: '../loads/check-email.php', 
            type: 'POST',
            data: {email: email},  
            dataType: 'text',  
            success: function(response) {
                var responseParts = response.split('|');
                if (responseParts[0] == 'error') {
                    $('#email').addClass('is-invalid'); 
                    $('#email-feedback').text(responseParts[1]); 
                } else if (responseParts[0] == 'success') {
                   
                    $('#email').removeClass('is-invalid').addClass('is-valid');  
                    $('#email-feedback').text(''); 
                }
            },
            error: function() {
                // Handle any AJAX errors
                $('#email').addClass('is-invalid');
                $('#email-feedback').text('There was an error with the server.');
            }
        });
    } else {
        // Remove both classes if email is empty
        $('#email').removeClass('is-invalid').removeClass('is-valid');
        $('#email-feedback').text(''); 
    }
});
}
email();

// Registration JS
$(document).ready(function(){
  
    let currentStep = 1;    

   
    function showStep(step) {
        $('.step').removeClass('step-active').addClass('d-none');
        $('#step-' + step).removeClass('d-none').addClass('step-active');
    }

    // Display error message for invalid input
    function setInvalid(input, message) {
        let errorMessageContainer = input.siblings('.invalid-feedback');
        errorMessageContainer.text(message);
        input.addClass('is-invalid').removeClass('is-valid');
    }

    // Validate individual input fields
    function validateInputs(input, callback){
        let isValid = true;

      
        if(!['data-text'] && input.val() === '') {
            callback(input, 'Please input your ' + input.attr('id'));
            isValid = false;
        }
        else if(input.val() === "" ) {
            callback(input, 'Please input your ' + input.attr('id'));
            isValid = false;
        } 
        // Ensure text fields have at least 6 characters
        else if (input.attr('type') === 'text' && input.val().length < 6 && !['data-text'] ) {
            callback(input, input.attr('id') + " must be at least 6 characters");
            isValid = false;
        }
        // Use the native validation for email, number, and date types
        else if (!input[0].checkValidity()) {
            callback(input, input[0].validationMessage);
            isValid = false;
        } else {
          
            input.removeClass('is-invalid').addClass('is-valid');
            input.siblings('.invalid-feedback').text('');
        }

        return isValid;
    }

// Validate step inputs (includes select validation)
function validateStep(step) {
    let isValid = true;
    let currentStepDiv = $('#step-' + step);
    let inputs = currentStepDiv.find('input');
    let selects = currentStepDiv.find('select');

    // Validate select elements (like gender, department, program)
    selects.each(function(){
        let select = $(this);
        if (select.val() === "" || !select.find('option:selected').val()) {
            isValid = validateInputs(select, setInvalid) && isValid;
        } else {
            select.removeClass('is-invalid').addClass('is-valid');
            select.siblings('.invalid-feedback').text('');
        }
    });

    // Validate input fields (text, email, etc.)
    inputs.each(function() {
        isValid = validateInputs($(this), setInvalid) && isValid;
    });

    return isValid;
}
    // Show initial step
    showStep(currentStep);

    // Trigger next button click (move to the next step)
    $('.next-btn').on("click", function(e){
        e.preventDefault();

        // var emailInput = $('#email');
        // if (emailInput.hasClass('is-invalid')) {
        //     return; 
        // }
        if (validateStep(currentStep)) {
            if (currentStep === 1) {
                const firstname = $('#firstname').val();
                const lastname = $('#lastname').val();
                const middlename = $('#middlename').val();
                const address = $('#address').val();
                const birthdate = $('#dateofbirth').val();
                const email = $('#email').val();
                const phone = $('#phonenumber').val();

                const formData = {
                    firstname: firstname,
                    lastname: lastname,
                    middlename: middlename,
                    address: address,
                    birthdate: birthdate,
                    email: email,
                    phone: phone
                };

                // Send the data to the PHP file for authentication and validation
                $.ajax({
                    type: "POST",
                    url: '../loads/step1Authentication.php', 
                    data: formData,
                    success: function(response) {
                    
                    $('#firstname, #lastname, #middlename, #email, #phonenumber, #address').removeClass('is-invalid');
                    $('.invalid-feedback').text('');

                    if (response === 'success') {
                        currentStep++;
                        showStep(currentStep);
                    } else {
                        // Add 'is-invalid' class and display the error messages
                        if (response.includes('First name should contain only letters')) {
                            $('#firstname').addClass('is-invalid');
                            $('#firstname').siblings('.invalid-feedback').text(response);
                        }

                        if (response.includes('Last name should contain only letters')) {
                            $('#lastname').addClass('is-invalid');
                            $('#lastname').siblings('.invalid-feedback').text(response);
                        }

                        if (response.includes('Middle name should contain only letters')) {
                            $('#middlename').addClass('is-invalid');
                            $('#middlename').siblings('.invalid-feedback').text(response);
                        }

                        if (response.includes('Address must be in the format')) {
                            $('#address').addClass('is-invalid');
                            $('#address').siblings('.invalid-feedback').text(response);
                        }

                        if (response.includes('Email address is not valid')) {
                            $('#email').addClass('is-invalid');
                            $('#email').siblings('.invalid-feedback').text(response);
                        }

                        if (response.includes('Phone number must be exactly 11 digits')) {
                            $('#phonenumber').addClass('is-invalid');
                            $('#phonenumber').siblings('.invalid-feedback').text(response);
                        }
                    }
                },
                error: function() {
                    alert("Error during the authentication process. Please try again.");
                }
                });
            }
            else if(currentStep === 2) {
                const formerSchoolName = $('#formerSchoolName').val();
                const formerSchoolAddress = $('#formerSchoolAddress').val();
             

                const formData = {
                    formerSchoolName: formerSchoolName,
                    formerSchoolAddress: formerSchoolAddress
                };

                // Send the data to the PHP file for authentication and validation
                $.ajax({
                    type: "POST",
                    url: '../loads/step2Authentication.php', 
                    data: formData,
                    success: function(response) {
                    
                    $('#formerSchoolName, #formerSchoolAddress').removeClass('is-invalid');
                    $('.invalid-feedback').text('');

                    if (response === 'success') {
                        currentStep++;
                        showStep(currentStep);
                        displayStep3Data();
                    } else {
                        if (response.includes('Former school name should contain only letters, spaces, and symbols')) {
                            $('#formerSchoolName').addClass('is-invalid');
                            $('#formerSchoolName').siblings('.invalid-feedback').text(response);
                        }

                        if (response.includes('Former school address must be in the format: Barangay, City, Municipality')) {
                            $('#formerSchoolAddress').addClass('is-invalid');
                            $('#formerSchoolAddress').siblings('.invalid-feedback').text(response);
                        }
                    }
                },
                error: function() {
                    alert("Error during the authentication process. Please try again.");
                }
                });
               
            }else{  
                currentStep++;
                showStep(currentStep);
            }
                
            
        }
    });

    // Trigger previous button click (move to the previous step)
    $('.prev-btn').on("click", function(e){
        e.preventDefault();
        currentStep--;
        showStep(currentStep);
    });

    // Function to collect data from Step 1 and Step 2 and display in Step 3
    function displayStep3Data() {
        
        // Get data from Step 1
        const firstname = $('#firstname').val();
        const middlename = $('#middlename').val();
        const lastname = $('#lastname').val();
        const gender = $('#gender').val();
        const dateofbirth = $('#dateofbirth').val();
        const email = $('#email').val();
        const phonenumber = $('#phonenumber').val();
        const address = $('#address').val();

        // Get data from Step 2
        const formerSchoolName = $('#formerSchoolName').val();
        const formerSchoolAddress = $('#formerSchoolAddress').val();
        const formerSchoolYear = $('#formerSchoolYear').val();
        const department = $('#department').val();
        const program = $('#program').val();

        // Display data in Step 3
        const step3Content = `
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="color-main">
                            First Name:
                        </label>
                        <input class="form-control" value="${firstname}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Middle Name:
                        </label>
                        <input class="form-control" value="${middlename}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Last Name:
                        </label>
                        <input class="form-control"  value="${lastname}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Gender:
                        </label>
                        <input class="form-control"value="${gender}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Birthdate:
                        </label>
                        <input class="form-control"  value="${dateofbirth}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" >
                            Email:
                        </label>
                        <input class="form-control"  value="${email}" type="email" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" >
                            Phone No:
                        </label>
                        <input class="form-control" value="${phonenumber}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Address:
                        </label>
                        <input class="form-control" value="${address}" type="text" disabled />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="color-main">
                            Past Institution:
                        </label>
                        <input class="form-control" value="${formerSchoolName}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Past Institution Address:
                        </label>
                        <input class="form-control"  value="${formerSchoolAddress}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            School Year:
                        </label>
                        <input class="form-control" value="${formerSchoolYear}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Select Department to Enroll
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Department:
                        </label>
                        <input class="form-control" value="${department}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Program:
                        </label>
                        <input class="form-control" value="${program}" type="text" disabled />
                    </div>
                </div>
            </div>
        </form>
        <small><b>Note: </b> Please ensure that your Gmail account exists to receive the email.</small>
        `;

        // Insert the collected data into Step 3
        $('#step-3').find('.form-group').html(step3Content);
    }

    $("#form").on('click', function(e){
        e.preventDefault();
    
        // If email is invalid, do not submit the form
        if ($('#email').hasClass('is-invalid')) {
            alert("Please fix the email error before submitting the form.");
            return; 
        }
    
        // Validate the rest of the form (existing logic)
        let formData = $("#multi-step-form").serialize();
        $.ajax({
            type:"POST",
            url: '../loads/action.php',
            data: formData,
            success:function(data){
                window.location.href = '/registered';
                $('#multi-step-form')[0].reset(); 
            }
        })
    });
});
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
            console.log("Error: " + error);  // Log the specific error
            console.log("Status: " + status); // Log the status
            console.log("Response Text: " + xhr.responseText);  // Log the response text
            passwordError.text("Sign In Error");
        });
        
    })
});

// Toggle Navigation

// Registration JS
$(document).ready(function(){
    // Track current step
    let currentStep = 1;    

    // Control which step is visible
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
        // Validate individual input fields
function validateInputs(input, callback){
    let isValid = true;

    // For text, email, number, and date inputs, check if empty
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
        // If valid, remove error styling and clear error message
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
        // Only trigger error if the selected value is an empty string (""), which indicates no valid option selected
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
        if (validateStep(currentStep)) {
            if(currentStep === 2) {
                // Collect data from Step 1 and Step 2 when moving to Step 3
                console.log('test')
                displayStep3Data();
            }
            currentStep++;
            showStep(currentStep);
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
                        <label class="color-main" for="firstName">
                            First Name:
                        </label>
                        <input class="form-control" id="firstName" value="${firstname}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="MiddleName">
                            Middle Name:
                        </label>
                        <input class="form-control" id="MiddleName" value="${middlename}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="lastName">
                            Last Name:
                        </label>
                        <input class="form-control" id="lastName" value="${lastname}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="gender">
                            Gender:
                        </label>
                        <input class="form-control" id="gender" value="${gender}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="birthdate">
                            Birthdate:
                        </label>
                        <input class="form-control" id="birthdate" value="${dateofbirth}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="email">
                            Email:
                        </label>
                        <input class="form-control" id="email" value="${email}" type="email" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="phone">
                            Phone No:
                        </label>
                        <input class="form-control" id="phone" value="${phonenumber}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="address">
                            Address:
                        </label>
                        <input class="form-control" id="address" value="${address}" type="text" disabled />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="color-main" for="pastInstitution">
                            Past Institution:
                        </label>
                        <input class="form-control" id="pastInstitution" value="${formerSchoolName}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="pastInstitutionAddress">
                            Past Institution Address:
                        </label>
                        <input class="form-control" id="pastInstitutionAddress" value="${formerSchoolAddress}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="schoolYear">
                            School Year:
                        </label>
                        <input class="form-control" id="schoolYear" value="${formerSchoolYear}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main">
                            Select Department to Enroll
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="department">
                            Department:
                        </label>
                        <input class="form-control" id="department" value="${department}" type="text" disabled />
                    </div>
                    <div class="form-group">
                        <label class="color-main" for="program">
                            Program:
                        </label>
                        <input class="form-control" id="program" value="${program}" type="text" disabled />
                    </div>
                </div>
            </div>
        </form>

        `;

        // Insert the collected data into Step 3
        $('#step-3').find('.form-group').html(step3Content);
    }

    // Form submission handler
    $("#form").on('click', function(e){
        e.preventDefault();
        if (validateStep(currentStep)) {
            let formData = $("#multi-step-form").serialize();
            $.ajax({
                type:"POST",
                url: '../loads/action.php',
                data: formData,
                success:function(data){
                    alert(data);
                    window.location.href = '/registered';
                    $('#multi-step-form')[0].reset(); 
                }
            })
        } else {
            alert('Please fix the errors before submitting the form.');
        }
    });
});
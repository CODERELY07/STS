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
            <h4>Your Information:</h4>
            <p><strong>First Name:</strong> ${firstname}</p>
            <p><strong>Middle Name:</strong> ${middlename}</p>
            <p><strong>Last Name:</strong> ${lastname}</p>
            <p><strong>Gender:</strong> ${gender}</p>
            <p><strong>Date of Birth:</strong> ${dateofbirth}</p>
            <p><strong>Email:</strong> ${email}</p>
            <p><strong>Phone Number:</strong> ${phonenumber}</p>
            <p><strong>Address:</strong> ${address}</p>
            <h4>Former School Information:</h4>
            <p><strong>Former School Name:</strong> ${formerSchoolName}</p>
            <p><strong>Former School Address:</strong> ${formerSchoolAddress}</p>
            <p><strong>Graduation Year:</strong> ${formerSchoolYear}</p>
            <h4>Department and Program:</h4>
            <p><strong>Department:</strong> ${department}</p>
            <p><strong>Program:</strong> ${program}</p>
        `;

        // Insert the collected data into Step 3
        $('#step-3').find('.form-group').html(step3Content);
    }

    // Form submission handler
    $('#multi-step-form').on('submit', function(e) {
        e.preventDefault();

        if (validateStep(currentStep)) {
            let formData = $(this).serialize();
        
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
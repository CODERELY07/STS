<!-- This is the registration form of students -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Registration</title>
    <link rel="icon" type="image/x-icon" href="../src/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css?<?php echo time()?>">
    <link rel="stylesheet" href="../css/register.css?<?php echo time()?>">
   
  </head>
  <body>
  <?php   require 'partials/register-header.php';?>
    <div class="container mt-5">
        <form id="multi-step-form">
            <div id="step-1" class="step step-active">
                <p class="color-main">Personal Information</p>
                <div class="form-group">
                    <label class="color-main" for="email">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <div class="invalid-feedback" id="email-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="firstname">First Name: </label>
                    <input type="text" class="form-control"name="firstname" id="firstname" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="middlename">Middle Name: </label>
                    <input type="text" class="form-control"  data-text  name="middlename" id="middlename" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="lastname">Last Name: </label>
                    <input type="text"  data-text  class="form-control" name="lastname" id="lastname" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="gender">Gender: </label>
                    <select name="gender" id="gender" class="form-control">
                        <option value=""></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="dateofbirth">Date Of Birth: </label>
                    <input type="date" class="form-control" name="dateofbirth" id="dateofbirth"  min="2000-01-01" max="2007-12-31" required>
                    <div class="invalid-feedback"></div>
                </div>

                <div class="form-group">
                    <label class="color-main" for="phonenumber">Phone Number: </label>
                    <input type="number" class="form-control" name="phonenumber" id="phonenumber" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="address">Complete Address (City, Province, Barangay): </label>
                    <input type="text" class="form-control" name="address" id="address" required>
                    <div class="invalid-feedback"></div>
                </div>
                <button class="btn btn-primary float-end next-btn" id="step1-btn">Next</button>
            </div>

            <div id="step-2" class="step">
                <p class="color-main">Past Institution Details</p>
                <div class="form-group">
                    <label class="color-main" for="formerSchoolName">Past Institution: </label>
                    <input type="text" class="form-control" name="formerSchoolName" id="formerSchoolName" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="formerSchoolAddress">Past Institution Address: </label>
                    <input type="text" class="form-control" name="formerSchoolAddress" id="formerSchoolAddress" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="formerSchoolYear">School Year: </label>
                    <input type="date" class="form-control" name="formerSchoolYear" id="formerSchoolYear"  min="2020-01-01" max="2023-12-31" required>
                    <div class="invalid-feedback"></div>
                </div>
                <h6 class="color-main">Select Department to Enroll</h6>
                <div class="form-group">
                    <label class="color-main" for="department">Department:</label>
                    <select name="department" id="department" class="form-control" required>
                        <option value=""></option>
                        <?php
                            foreach($departments as $department):
                        ?>
                        <option value="<?php echo htmlspecialchars($department['deparmentName'], ENT_QUOTES, 'UTF-8'); ?>">
                            <?php echo htmlspecialchars($department['deparmentName'], ENT_QUOTES, 'UTF-8'); ?>
                        </option>

                        <?php endforeach;?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label class="color-main" for="program">Program:</label>
                    <select name="program" id="program" class="form-control" required>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div>
                <button class="btn btn-secondary prev-btn">Go Back</button>
                <button class="btn btn-primary next-btn float-end">Next</button>
                </div>
            
            </div>

            <div id="step-3" class="step">
                <p class="color-main">Check Your Information</p>
                <div class="form-group"></div>
                <div>
                <button class="btn btn-secondary prev-btn">Prev</button>
                <input type="submit" id="form" class="btn btn-primary next-btn float-end" value="Submit">
                </div>
                
            </div>
        </form>
    </div>

<?php
    require 'partials/register-footer.php';
    require 'partials/footer.php';
?>


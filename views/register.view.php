<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Multi-Step Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .step {
            display: none;
        }
        .step-active {
            display: block;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
    </style>
  </head>
  <body>
    <div class="container mt-5">
        <h2 class="text-center">Multi-Step Form</h2>
        <form id="multi-step-form">
            <div id="step-1" class="step step-active">
                <h3>Personal Information</h3>
                <div class="form-group">
                    <label for="firstname">First Name: </label>
                    <input type="text" class="form-control"name="firstname" id="firstname" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="middlename">Middle Name: </label>
                    <input type="text" class="form-control"  data-text  name="middlename" id="middlename" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name: </label>
                    <input type="text"  data-text  class="form-control" name="lastname" id="lastname" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="gender">Gender: </label>
                    <select name="gender" id="gender" class="form-control">
                        <option value=""></option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="dateofbirth">Date Of Birth: </label>
                    <input type="date" class="form-control" name="dateofbirth" id="dateofbirth" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Phone Number: </label>
                    <input type="number" class="form-control" name="phonenumber" id="phonenumber" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="address">Complete Address (City, Province, Barangay): </label>
                    <input type="text" class="form-control" name="address" id="address" required>
                    <div class="invalid-feedback"></div>
                </div>
                <button class="btn btn-primary next-btn">Next</button>
            </div>

            <div id="step-2" class="step">
                <h3>Student Information</h3>
                <h4>Former School Details</h4>
                <div class="form-group">
                    <label for="formerSchoolName">Former School Name</label>
                    <input type="text" class="form-control" name="formerSchoolName" id="formerSchoolName" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="formerSchoolAddress">Former School Address</label>
                    <input type="text" class="form-control" name="formerSchoolAddress" id="formerSchoolAddress" required>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="formerSchoolYear">Former School Graduation</label>
                    <input type="date" class="form-control" name="formerSchoolYear" id="formerSchoolYear" required>
                    <div class="invalid-feedback"></div>
                </div>
                <h4>Select Your Department you want to Enroll</h4>
                <div class="form-group">
                    <label for="department">Department</label>
                    <select name="department" id="department" class="form-control" required>
                        <option value=""></option>
                        <?php
                            foreach($departments as $department):
                        ?>
                        <option value="<?php echo $department['deparmentName'] ?>"><?php echo $department['deparmentName'] ?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="program">Program</label>
                    <select name="program" id="program" class="form-control" required>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
                <button class="btn btn-secondary prev-btn">Prev</button>
                <button class="btn btn-primary next-btn">Next</button>
            </div>

            <div id="step-3" class="step">
                <h3>Check Your Information</h3>
                <div class="form-group">

                </div>
                <button class="btn btn-secondary prev-btn">Prev</button>
                <input type="submit" class="btn btn-success" value="Submit">
            </div>
        </form>
    </div>

<?php
    require 'partials/footer.php';
?>


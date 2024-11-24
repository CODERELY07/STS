<?php

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
                <main class="content px-3 py-2">
                    <div class="container-fluid">
                    <div class="container">
                <h1 class="text-center display-5 mt-4 mb-4">Edit Profile</h1>
                
                <form action="/editStudPersonalInfo" method="POST" enctype="multipart/form-data">
                    <div class="form-section-title mb-4">Edit Your Personal Information</div>

                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $student['firstname']?>"required>
                    </div>

                    <div class="mb-3">
                        <label for="middlename" class="form-label">Middle Name:</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" value="<?= $student['middlename']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $student['lastname']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select class="form-select" name="gender" id="gender">
                            <option value=""></option>
                            <option value="male" <?= ($student['gender'] == 'male' ? 'selected' : '')?>>Male</option>
                            <option value="female" <?= ($student['gender'] == 'female' ? 'selected' : '')?>>Female</option>
                            <option <?= ($student['gender'] == 'other' ? 'selected' : '')?> value="other">Other</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dateofbirth" class="form-label">Date of Birth:</label>
                        <input type="date" class="form-control" id="dateofbirth" value="<?= $student['dateofbirth']?>" name="dateofbirth">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" value="<?= $student['email']?>" name="email" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $student['address'] ?>">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $student['phone']?>">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn mt-2 float-end btn-primary">Save Changes</button>
                    </div>
                </form>

                <!-- Former School Information Section -->
                <form action="/editStudPersonalInfo" method="POST" class="pt-5" enctype="multipart/form-data">
                    <div class="form-section-title mt-5">Edit Your Former School Information</div>

                    <div class="mb-3">
                        <label for="formerschoolname" class="form-label">Former School Name:</label>
                        <input type="text" class="form-control" id="formerschoolname" name="formerschoolname" value="<?= $student['formerschoolname']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="formerschooladdress" class="form-label">Former School Address:</label>
                        <input type="text" class="form-control" id="formerschooladdress" name="formerschooladdress" value="<?= $student['formerschooladdress']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="graduationYear" class="form-label">Graduation Year:</label>
                        <input type="date" class="form-control" id="graduationYear" name="graduationYear" value="<?= $student['graduationyear']?>" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary float-end">Save Changes</button>
                    </div>
                </form>

                <!-- Account Information Section -->
                <form action="/editStudPersonalInfo"  method="POST" class="pt-4" enctype="multipart/form-data">
                    <div class="form-section-title mt-5">Edit Your Account</div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Old Password" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary float-end">Save Changes</button>
                    </div>
                </form>
            </div>
                </div>
            </main>
            <?php 
            require_once 'partials/admin-footer.php';
        ?>


 

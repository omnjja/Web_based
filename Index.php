<?php
// Index.php - Main page that includes the registration form
include 'Header.php';
?>
    <div>
        <div>
            <h4>User Registration</h4>
        </div>
        <div>
            <form id="registrationForm" method="post" action="DB_Ops.php" enctype="multipart/form-data">
                <div>
                    <label for="full_name">Full Name *</label>
                    <input type="text" id="full_name" name="full_name" required>
                </div>
                <div>
                    <label for="user_name">Username *</label>
                    <input type="text" id="user_name" name="user_name" required>
                </div>
                <div>
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div>
                    <label for="whatsapp">WhatsApp Number *</label>
                    <input type="tel" id="whatsapp" name="whatsapp" required>
                    <button type="button" id="validateWhatsApp">Validate</button>
                </div>
                <div>
                    <label for="address">Address *</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div>
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <label for="confirm_password">Confirm Password *</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </div>
                <div>
                    <label for="user_image">Profile Image *</label>
                    <input type="file" id="user_image" name="user_image" required>
                </div>
                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
<?php
include 'Footer.php';
?>
<?php
// Index.php - Main page that includes the registration form
include 'Header.php';
?>
    <div>
        <div class="form-container">
        <h4>User Registration</h4>
            <form id="registrationForm" method="post" action="DB_Ops.php" enctype="multipart/form-data" >
                <div>
                    <label for="full_name">Full Name *</label>
                    <input type="text" id="full_name" name="full_name" >
                    <small class="error-msg" id="error-full_name"></small>
                </div>
                <div>
                    <label for="user_name">Username *</label>
                    <input type="text" id="user_name" name="user_name">
                    <small class="error-msg" id="error-user_name"></small>
                    <div id="username-status" style="font-size: 12px; margin-top: 4px;"></div>
                </div>
                <div>
                    <label for="email">Email *</label>
                    <input type="text" id="email" name="email">
                    <small class="error-msg" id="error-email"></small>
                </div>
                <div>
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone">
                    <small class="error-msg" id="error-phone"></small>
                </div>
                <div>
                    <label for="whatsapp">WhatsApp Number *</label>
                    <input type="tel" id="whatsapp" name="whatsapp">
                    <button type="button" id="validateWhatsApp">Validate</button>
                    <small class="error-msg" id="error-whatsapp"></small>
                </div>
                <div>
                    <label for="address">Address *</label>
                    <input type="text" id="address" name="address">
                    <small class="error-msg" id="error-address"></small>
                </div>
                <div>
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password">
                    <small class="error-msg" id="error-password"></small>
                </div>
                <div>
                    <label for="confirm_password">Confirm Password *</label>
                    <input type="password" id="confirm_password" name="confirm_password">
                    <small class="error-msg" id="error-confirm_password"></small>
                </div>
                <div>
                    <label for="user_image">Profile Image *</label>
                    <input type="file" id="user_image" name="user_image">
                    <small class="error-msg" id="error-user_image"></small>
                </div>
                <div>
                    <button type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>



    <script>
    const regForm = document.getElementById("registrationForm");

    regForm.addEventListener("submit", function (e) {
        e.preventDefault(); 

        let valid = true;
        const fields = [
            "full_name", "user_name", "email", "phone",
            "whatsapp", "address", "password", "confirm_password", "user_image"
        ];
        // Regexes
        const nameRegex = /^[a-zA-Z\s]+$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^(010|011|012|015)[0-9]{8}$/;
        const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

        fields.forEach(field => {
            const input = document.getElementById(field);
            const error = document.getElementById("error-" + field);

                    // Hide error when user starts typing
            input.addEventListener("input", function () {
            if (input.value.trim() !== "") {
                input.classList.remove("error");
                error.classList.remove("show");
                error.textContent = "";
                }
            });

            //to remove old error messages
            input.classList.remove("error");
            error.classList.remove("show");
            error.textContent = "";

            if (!input.value) {
                input.classList.add("error");
                error.textContent = "This field is required.";
                error.classList.add("show");// to inform css to show this 
                valid = false;
            } else {
                if (field === "full_name" && !nameRegex.test(input.value)) {
                    input.classList.add("error");
                    error.textContent = "Full name must contain only letters and spaces.";
                    error.classList.add("show");
                    valid = false;
                }
                if (field === "email" && !emailRegex.test(input.value)) {
                    input.classList.add("error");
                    error.textContent = "Invalid email format.";
                    error.classList.add("show");
                    valid = false;
                }
                if (field === "phone" && !phoneRegex.test(input.value)) {
                input.classList.add("error");
                error.textContent = "Phone must start with 010, 011, 012, or 015 and be 11 digits.";
                error.classList.add("show");
                valid = false;
                }
                if (field === "password" && !passwordRegex.test(input.value)) {
                    input.classList.add("error");
                    error.textContent = "Password must be 8+ chars with 1 number & 1 special character.";
                    error.classList.add("show");
                    valid = false;
                }
                if (field === "confirm_password" && input.value !== document.getElementById("password").value) {
                    input.classList.add("error");
                    error.textContent = "Passwords do not match.";
                    error.classList.add("show");
                    valid = false;
                }
            }
        });
        if (valid) {
            this.submit(); 
        }
    });

    const userName = document.getElementById("user_name");
    userName.addEventListener("input", function () {
        const username = this.value;

        if (username.length > 2) {
            fetch("check_username.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                body: "username=" + encodeURIComponent(username),
            })
            .then(response => response.text())
            .then(data => {
                const msg = document.getElementById("username-status");
                if (data === "taken") {
                    msg.textContent = "❌ Username already taken!";
                    msg.style.color = "red";
                } else {
                    msg.textContent = "✅ Username is available!";
                    msg.style.color = "green";
                }
            })
            .catch(err => console.error("Error checking username: ", err));
        }
    });

    document.getElementById("validateWhatsApp").addEventListener("click", function () {
        const number = document.getElementById("whatsapp").value;
        fetch("API_Ops.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "whatsapp=" + encodeURIComponent(number),
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
        })
        .catch(error => {
            alert("Error: " + error);
        });
    });
    </script>
    
<?php
include 'Footer.php';
?>

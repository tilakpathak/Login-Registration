<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">REGISTER</h2>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" id="password" required>
                    </div>
                    <div class="form-group">
                        <div id="password-strength-meter"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="6LeheGMlAAAAAK3t5n6jvwaAD5GtXk2St4mxAN9f"></div>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already have an account? <a href="login-user.php">Login</a></div>
                </form>
            </div>
        </div>
    </div>
    <script>

        $('#password').keyup(function() {
            var password = $(this).val();
            var passwordMeter = $('#password-strength-meter');
            var strength = calculatePasswordStrength(password);
            passwordMeter.removeClass();
            if (strength === 0) {
                passwordMeter.addClass('very-weak');
                passwordMeter.html('Very weak');
            } else if (strength === 1) {
                passwordMeter.addClass('weak');
                passwordMeter.html('Weak');
            } else if (strength === 2) {
                passwordMeter.addClass('moderate');
                passwordMeter.html('Moderate');
            } else {
                passwordMeter.addClass('strong');
                passwordMeter.html('Strong');
            }
        });


    function calculatePasswordStrength(password) {
        var strength = 0;
        if (password.length >= 8) {
            strength += 1;
        }
        if (password.match(/[a-z]+/)) {
            strength += 1;
        }
        if (password.match(/[A-Z]+/)) {
            strength += 1;
        }
        if (password.match(/[0-9]+/)) {
            strength += 1;
        }
        if (password.match(/[$@#&!]+/)) {
            strength += 1;
        }
        return strength;
    }
    </script>

    <!-- Add the CSS code to style the password strength meter -->
    <style>
        #password-strength-meter {
            height: 10px;
            margin-top: 5px;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: #ccc;
        }

        #password-strength-meter.very-weak {
            background-color: #ff0000;
        }

        #password-strength-meter.weak {
            background-color: #ff7f00;
        }

        #password-strength-meter.moderate {
            background-color: #ffff00;
        }

        #password-strength-meter.strong {
            background-color: #00ff00;
        }
    </style>
    
</body>
</html>
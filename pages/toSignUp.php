<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <?php include 'includecss.php'; ?>

</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="index.php">
                <input type="hidden" name="choice" value="register">
                <span class="login100-form-title p-b-43">
                        Sign Up <br>
					</span>
                <?php if (!empty($_SESSION['password_error'])) { ?>
                    <div class="alert alert-danger login100">
                        <?php echo $_SESSION['password_error']; ?>
                    </div>
                <?php } ?>


                <div class="wrap-input100 validate-input" data-validate="First Name is required">
                    <input class="input100" type="text" name="firstName">
                    <span class="focus-input100"></span>
                    <span class="label-input100">First Name</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Last Name is required">
                    <input class="input100" type="text" name="lastName">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Last Name</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="confirmPassword">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Confirm Password</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Submit
                    </button>
                </div>
                <br>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn-half left" type="reset">
                        Reset
                    </button>
                    <button class="button-link login100-form-btn-half right" type="button" onclick="window.location.href='index.php?choice=toWelcome';">
                            Back
                        </button>


                </div>
            </form>
            <div class="login100-more" style="background-image: url('css/images/doll.jpg');">
            </div>
        </div>
    </div>
</div>

<?php include 'includejs.php'; ?>
</body>
</html><?php

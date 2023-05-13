<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp page</title>
    <?php include 'includecss.php'; ?>

</head>
<body style="background-color: #666666;">

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="index.php">
                <input type="hidden" name="choice" value="login">
                <span class="login100-form-title p-b-43">
                        Login<br>
					</span>
<!--                --><?php //if (!empty($_SESSION['password_error'])) { ?>
<!--                    <span class="login100-form-title-sub-smallertext p-b-10">-->
<!--                    <div class="alert alert-danger login100">-->
<!--                        --><?php //echo $_SESSION['password_error']; ?>
<!--                    </div>-->
<!--                    </span>-->
<!--                --><?php //} elseif (!empty($_SESSION['email_error'])) { ?>
<!--                    <span class="login100-form-title-sub-smallertext p-b-10">-->
<!--                    <div class="alert alert-danger login100">-->
<!--                        --><?php //echo $_SESSION['email_error']; ?>
<!--                    </div>-->
<!--                    </span>-->
<!--                --><?php //} ?>

<!--                </div>-->
                <div class="wrap-input100 validate-input" data-validate="Email is required">
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
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
            <div class="login100-more" style="background-image: url('css/images/notepad.jpg');">
            </div>
        </div>
    </div>
</div>

<?php include 'includejs.php'; ?>
</body>
</html><?php

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome page</title>
    <?php include 'includecss.php'; ?>
</head>
<body style="background-color: #666666;">
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <input type="hidden" name="choice" value="register">
                <span class="login100-form-title p-b-43">
                        Welcome<?php if (isset($_POST['firstName']) && isset($_POST['lastName'])) { echo '<br>' . $firstName . ' ' . $lastName;?>
                </span>
                <span class="login100-form-title-sub p-b-20">
                    You can now LogIn<?php } ?>!
					</span>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="button" onclick="window.location.href='index.php?choice=toSignUp';">
                        Sign Up
                        <span class="focus-input100"></span>
                    <span class="label-input100"></span>
                    </button>
                    <button class="login100-form-btn m-t-20" type="button" onclick="window.location.href='index.php?choice=toLogin';">
                        Login
                        <span class="focus-input100"></span>
                        <span class="label-input100"></span>
                    </button>
                </div>
            </form>
            <div class="login100-more" style="background-image: url('css/images/card.jpg');">
            </div>
        </div>
    </div>
</div>
<?php include 'includejs.php'; ?>
</body>
</html>
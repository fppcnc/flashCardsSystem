<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
<div class="table">
    <form method="post" action="index.php">
        <input type="hidden" name="choice" value="register">
<?php if ($err == 0){ ?>
        <div class="row header">Welcome! Fill out the fields to register and get started. <br></div>
        <?php } else { ?>
        <div class="row header"> The passwords you entered do not match. It happens, try again.</div><br> <?php } ?>
        <div class="row">First Name<input type="text" name="firstName" required value="<?php if(isset($firstName)) { echo $firstName; }?>"></div>
        <div class="row">Last Name<input type="text" name="lastName" required></div>
       <div class="row">Password <input type="password" name="password" required"></div>
        <div class="row">Confirm Password<input type="password" name="confirmPassword" required"></div>
        <div class="row"><button type="submit" class="Save">Submit</button> <button type="reset" class="Reset">Reset</button></div>
    </form>
</div>
</body>
</html><?php

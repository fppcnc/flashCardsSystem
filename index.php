<?php
//config.php for db credentials
include 'classes/Student.php';
include 'config.php';

$choice = $_REQUEST['choice'] ?? 'toWelcome';

//get data from signup page
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

//access toWelcome.php
switch ($choice) {
    //connected to pages
    case 'toWelcome':
        $page = 'toWelcome';
        break;
        case 'toLogin':
        $page = 'toLogin';
        break;
    case 'toSignUp';
        $page = 'toSignUp';
        break;
    case 'toResetPasswd':
        $page = 'toResetPasswd';
        break;
    case 'register':
        //if password fields match, we store in database
        if ($password === $confirmPassword) {
            $checkEmail = (new Student())->checkForDoubleEmail($email);
            // if method checkForDoubleEmail return false, aka no identical email on database
            // then go on with registration
            if ($checkEmail === false) {
                $_SESSION['email_error'] = '';
                (new Student())->registerNewStudent($firstName, $lastName, $email, $password);
                $_SESSION['password_error'] = '';
                $page = "toWelcome";
            } else {
                $_SESSION['email_error'] = 'This email is associated to another Student';
                $page = 'toSignUp';
            }
            // if password fields don´t match, send back
        } else {
            $_SESSION['password_error'] = "Given Passwords don't match";
            $page = 'toSignUp';
        }
        break;
    default :
        $page = $choice;
        break;
}
include 'pages/' . $page . '.php';

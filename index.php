<?php
//config.php for db credentials
include 'classes/Student.php';
include 'config.php';

$choice = $_REQUEST['choice'] ?? 'toHome';

//get data from signup page
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';

//access toHome.php
switch ($choice) {
    //connected to pages
    case 'toHome':
        $page = 'toHome';
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
            // check if email already exists in Db
            $checkEmail = (new Student())->checkForEmail($email);
            // if method checkForDoubleEmail returns false, aka no identical email on database,
            // then go on with registration
            if ($checkEmail === false) {
                $_SESSION['error'] = '';
                (new Student())->registerNewStudent($firstName, $lastName, $email, $password);
                $_SESSION['error'] = '';
                $page = "toHome";
            } else {
                $_SESSION['error'] = 'This email is associated to another Student';
                $page = 'toSignUp';
            }
            // if password fields don´t match, send back
        } else {
            $_SESSION['error'] = "Given Passwords don´t match";
            $page = 'toSignUp';
        }
        break;
    case 'login':
        //grant access to next page if email and password match data in Db
        $log = (new Student())->grantAccess($email, $password);
        if ($log === false) {
            $page = 'toLogin';
            $_SESSION['error'] = "Email and Password dont´t match";
        } else {
            $_SESSION['error'] = '';
            $page = 'toWelcome';
        }
        break;
    default :
        $page = $choice;
        break;
}
include 'pages/' . $page . '.php';

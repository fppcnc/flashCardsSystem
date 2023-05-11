<?php
//config.php for db credentials
include 'classes/Student.php';
include 'config.php';

$choice = $_REQUEST['choice'] ?? 'toWelcome';

//get data from login page
$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
$err = 0;
echo '<pre>';
print_r($_POST);
echo '</pre>';

//access toWelcome.php
switch ($choice) {
    //connected to pages
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
            (new Student())->registerNewStudent($firstName, $lastName, $password);
            echo 'Welcome ' . $firstName . ' ' . $lastName . '!<br>';
            echo 'You can now LogIn';

            $page = "toWelcome";
            // if password fields don´t match, send back
        } else {
            $err = 1;
            $page = 'toSignUp';
        }
        break;
    default :
        $page = $choice;
        break;
}

include 'pages/' . $page . '.php';

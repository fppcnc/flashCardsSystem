<?php
$choice = $_REQUEST['choice'] ?? 'toWelcome';
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';

//access toWelcome.php
switch ($choice) {
    case 'toLogin':
        $page = 'toLogin';
        break;
    case 'toSignUp';
        $page = 'toSignUp';
        break;
    case 'toResetPasswd':
        $page = 'toResetPasswd';
        break;
    default :
        $page = $choice;
        break;
}

include 'pages/' . $page . '.php';

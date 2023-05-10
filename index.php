<?php
//access toLogin.php
$choice = null;
switch ($choice) {
    case 'toLogin':
        $page = $choice;
    default :
$page = 'toLogin';
}

include 'pages/' . $page . '.php';
http://localhost:63342/flashCardsSystem/pages/toLogin.php
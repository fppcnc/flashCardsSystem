<?php
$choice = $_REQUEST['choice'] ?? 'toWelcome';
echo '<pre>';
print_r($_REQUEST);
echo '</pre>';
//access toWelcome.php
$choice = null;
switch ($choice) {
    case 'toWelcome':
        $page = $choice;
    default :
$page = 'toWelcome';
}

include 'pages/' . $page . '.php';
http://localhost:63342/flashCardsSystem/pages/toWelcome.php
<?php
define('ROOT_DIR', __DIR__);
//define('ROOT_URL', 'http://localhost/lesson/lesson/social');
define('ROOT_URI', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . preg_replace('~/[^/]+$~is', '', $_SERVER['PHP_SELF']));
if (session_id() == '') {
    session_start();
}

include ROOT_DIR . "/functions.php";
if (isset($_GET['registrate'])) {
    include ROOT_DIR . "/includes/registrate.php";
    include ROOT_DIR . "/views/registrate.php";
} elseif (isset($_GET['login'])) {
    include ROOT_DIR . "/includes/login.php";
    include ROOT_DIR . "/views/login.php";
} elseif (isset($_GET['account'])) {
    include ROOT_DIR . "/includes/account.php";
    include ROOT_DIR . "/views/account.php";
} elseif (isset($_GET['logout'])) {
    include ROOT_DIR . "/includes/logout.php";
} elseif (isset($_GET['change'])) {
    include ROOT_DIR . "/includes/change.php";
    include ROOT_DIR . "/views/change.php";
} elseif (isset($_GET['users'])) {
    include ROOT_DIR . "/includes/users.php";
    include ROOT_DIR . "/views/users.php";
} elseif (isset($_GET['message'])) {
    include ROOT_DIR . "/includes/message.php";
    include ROOT_DIR . "/views/message.php";
}





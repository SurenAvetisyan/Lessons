<?php
defined('ROOT_DIR') or exit;

if (empty($_SESSION['is_logged']) || !$_SESSION['is_logged']) {
    header('Location: ?login');
    exit;
}


$user = ROOT_DIR . '/users/' . $_SESSION['user_email'] . '.json';
if (is_file($user)) {
    $user_data = file_get_contents($user);
    $user_data = json_decode($user_data, true);
    unset($user_data['password']);
    if ($user_data['image']) {
        $user_img = ROOT_URI . '/assets/images/' . $user_data['image'];
    } else {
        $user_img = null;
    }


    if (isset($_POST["change"])){
        header("Location: ?change");
        exit;


    }




} else {
    session_unset();
    header('Location: ?login');
    exit;
}
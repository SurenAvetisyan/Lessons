<?php
defined('ROOT_DIR') or exit;
$error = array();
$email = isset($_POST['email']) ? trim($_POST['email']) : '';

if (isset($_POST["send"])) {
    $password = isset($_POST['password']) ? md5(trim($_POST['password'])) : '';
    $user_file = ROOT_DIR . '/users/' . $email . '.json';
    if (is_file($user_file)) {
        $user = file_get_contents($user_file);
        $user_arr = json_decode($user, true);
        if ($user_arr['password'] == $password) {
            $_SESSION['is_logged'] = true;
            $_SESSION['user_email'] = $email;
            header('Location: ?account');
            exit;
        } else {
            $error[] = 'Wrong user or password';
        }
    } else {
        $error[] = 'Wrong user or password';
    }
}

if (!empty($error)) {
    session_unset();
}
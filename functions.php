<?php
function get_user_data($email = null) {
    if(!$email && isset($_SESSION['user_email'])){
        $email = $_SESSION['user_email'];
    }
    if (isset($email)) {
        $user = ROOT_DIR . '/users/' . $email . '.json';
        if (is_file($user)) {
            $user_data = file_get_contents($user);
            $user_data = json_decode($user_data, true);
            return $user_data;
        }
    }
    return null;
}

function set_user_data($data) {
    if (isset($_SESSION['user_email'])) {
        file_put_contents(ROOT_DIR . "/users/" . $_SESSION['user_email'] . ".json", json_encode($data));
        return true;
    }
    return false;
}
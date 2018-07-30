<?php
defined('ROOT_DIR') or exit;

if (isset($_POST['save'])) {
    $error = array();
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $password_1 = isset($_POST['password_1']) ? $_POST['password_1'] : '';
    $password_2 = isset($_POST['password_2']) ? $_POST['password_2'] : '';

    $user_data = get_user_data();

    if (md5($password_1) == $user_data['password']) {

        if (!preg_match("/^[a-zA-Z]{3,15}$/", $name)) {
            $error['name'] = 'Not valid name';
        }
        if (!preg_match("/^[a-z0-9]{6,15}$/", $password_2)) {
            $error["password"] = 'Not valid password';
        }

        if (empty($error)) {
            $password_2 = md5($password_2);

            $user_data['name'] = $name;
            $user_data['password'] = $password_2;

            set_user_data($user_data);
            header("Location: ?account");
            exit;
        }

    } else {
        $error['old_password'] = 'You enter wrong your old password';
    }


}


//var_dump($user_data);


?>

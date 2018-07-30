<?php
defined('ROOT_DIR') or exit;
$error = array();
if (isset($_POST["send"])) {

    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $_name = $_SESSION[$name];


    if (!preg_match('/^[a-z]+$/is', $name)) {
        $error["name"] = "Not Valid Name";
    }

    if (!preg_match('/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD', $email)) {
        $error["email"] = "Not Valid Email";
    }
    if (!preg_match('/^[a-z0-9]{6,20}$/is', $password)) {
        $error["password"] = "Not Valid Password";
    }
    if (is_file(ROOT_DIR . "/users/" . $email . ".json")){
            $error["exist"] = "User is already exist";
    }


    if (empty($error)) {
        $status = '';
        $image = '';
        if (isset($_FILES['file'])) {
            if (!$_FILES['file']['error']) {
                if ('image/jpeg' == $_FILES['file']['type'] ||
                    'image/png' == $_FILES['file']['type']) {
                    $ext = $_FILES['file']['type'] ? '.png' : '.jpg';
                    $image = $email . $ext;
                    move_uploaded_file($_FILES['file']['tmp_name'], ROOT_DIR . '/assets/images/' . $image);
                    $status = 'Ok';
                } else {
                    $status = 'Not Allowed Type';
                }
            } else {
                $status = 'Something Went Wrong';
            }
        }
        $password = md5($password);
        $data = compact("name", "email", "password", 'image');

        file_put_contents(ROOT_DIR . "/users/" . $email . ".json", json_encode($data));
        header("Location: ?login");
        exit;

    }


}